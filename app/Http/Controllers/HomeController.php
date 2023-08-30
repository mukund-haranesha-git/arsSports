<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Bookings;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Food;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['menu'] = 'Home';
        $data['banner'] = Banner::where('status','active')->get();
        return view('index',$data);
    }

    public function aboutUs(){
        return view('about');
    }

    public function contactUs(){
        $data['settings'] = Settings::findOrFail(1);
        return view('contactUs',$data);
    }

    public function storeContactUs(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required',
        ]);
        $input = $request->all();
        ContactUs::create($input);
        \Session::flash('success','Contact us detail submitted successfully!');
        return redirect('contactUs');
    }
}
