<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data['menu'] = "Dashboard";
        $data['total_banner'] = Banner::count();
        $data['total_category'] = Category::count();
        $data['total_contact'] = ContactUs::count();
        return view('admin.dashboard',$data);
    }

    public function settings(){
        $data['menu'] = 'Settings';
        $data['settings'] = Settings::findOrFail(1);
        return view('admin.settings',$data);
    }

    public function settingUpdate(Request $request, $id){
        $this->validate($request, [
            'phone' => 'required|numeric',
            'phone2' => 'numeric|nullable',
            'email'=>'required|email',
            'address1'=>'required',
            'timing1'=>'required',
        ]);

        $input = $request->all();
        $settings = Settings::where('id',$id)->first();

        if(false === strpos($request['facebook'], '://')){
            $input['facebook'] = 'http://' . $request['facebook'];
        }

        if(false === strpos($request['instagram'], '://')){
            $input['instagram'] = 'http://' . $request['instagram'];
        }

        $settings->update($input);

        \Session::flash('success', 'Settings has been updated successfully!');
        return redirect()->back();
    }

    public function contactUs(){
        $data['menu'] = 'Contact Us';
        $data['contactUs'] = ContactUs::orderBy('id','DESC')->Paginate($this->pagination);
        return view('admin.contactUs',$data);
    }

    public function contactUsDelete($id){
        $contactUs = ContactUs::findOrFail($id);
        $contactUs->delete();
        \Session::flash('danger','Contact has been deleted successfully!');
        return redirect()->back();
    }
}
