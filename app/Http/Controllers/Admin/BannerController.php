<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data['menu']="Banner";
        $data['search'] = $request['search'];
        $data['banner'] = Banner::orderBy('id','DESC')->Paginate($this->pagination);
        return view('admin.banner.index', $data);
    }

    public function create()
    {
        $data['menu']="Banner";
        return view("admin.banner.create",$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_text'=>'required',
            'image'=>'required|mimes:jpeg,bmp,png,jpg,webp',
            'status'=>'required',
        ]);
        $input = $request->all();
        if($photo = $request->file('image')){
            $image = $this->image($photo,'banner');
            $input['image'] = $this->Imagethumbnail_1920(public_path($image), 'banner');
        }

        Banner::create($input);

        \Session::flash('success', 'Banner has been inserted successfully!');
        return redirect('admin/banner');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['menu']="Banner";
        $data['banner'] = Banner::findorFail($id);
        return view('admin.banner.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'title_text'=>'required',
            'image'=>'mimes:jpeg,bmp,png,jpg,webp',
            'status'=>'required',
        ]);
        $input = $request->all();
        $banner = Banner::findorFail($id);
        if($photo = $request->file('image'))
        {
            $image = $this->image($photo,'banner');
            $input['image'] = $this->Imagethumbnail_1920(public_path($image), 'banner');
            if(!empty($banner['image']) && file_exists($banner['image'])){
                unlink($banner['image']);
            }
        }

        $banner->update($input);
        \Session::flash('success','Banner has been updated successfully!');
        return redirect('admin/banner');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if(!empty($banner['image']) && file_exists($banner['image'])){
            unlink($banner['image']);
        }
        $banner->delete();
        \Session::flash('danger','Banner has been deleted successfully!');
        return redirect('admin/banner');
    }

    public function assign(Request $request)
    {
        $banner = Banner::findorFail($request['id']);
        $banner['status'] = "active";
        $banner->update($request->all());
    }

    public function unassign(Request $request)
    {
        $banner = Banner::findorFail($request['id']);
        $banner['status'] = "inactive";
        $banner->update($request->all());
    }
}
