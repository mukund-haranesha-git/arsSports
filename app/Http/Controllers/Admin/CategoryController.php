<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data['menu']="Category";
        $query = Category::select();
        if(isset($request['search'])){
            $query->where(function ($qu) use($request){
                $qu->orWhere('name','like','%'.$request['search'].'%');
            });
        }
        $data['search'] = $request['search'];
        $data['category'] = $query->Paginate($this->pagination);
        return view('admin.category.index', $data);
    }

    public function create()
    {
        $data['menu']="Category";
        return view("admin.category.create",$data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'status'=>'required',
        ]);

        $input = $request->all();
        Category::create($input);
        \Session::flash('success', 'Category has been inserted successfully!');
        return redirect('admin/category');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $data['menu']="Category";
        $data['category'] = Category::findorFail($id);
        return view('admin.category.edit',$data);
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'status'=>'required',
        ]);
        $input = $request->all();
        $category = Category::findorFail($id);
        $category->update($input);

        \Session::flash('success','Category has been updated successfully!');
        return redirect('admin/category');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        \Session::flash('danger','Category has been deleted successfully!');
        return redirect('admin/category');
    }

    public function assign(Request $request){
        $category = Category::findorFail($request['id']);
        $category['status'] = "active";
        $category->update($request->all());
    }

    public function unassign(Request $request){
        $category = Category::findorFail($request['id']);
        $category['status'] = "inactive";
        $category->update($request->all());
    }
}
