<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data['menu']="Products";
        $query = Product::select();
        if(isset($request['search'])){
            $query->where(function ($qu) use($request){
                $qu->orWhere('title','like','%'.$request['search'].'%');
            });
        }
        $data['search'] = $request['search'];
        $data['products'] = $query->Paginate($this->pagination);
        return view('admin.products.index', $data);
    }

    public function create(){
        $data['menu']="Products";
        $data['category'] = Category::where('status','active')->pluck('name','id')->prepend('Please Select','');
        return view("admin.products.create",$data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
            'status'=>'required',
        ]);

        $input = $request->all();
        $input['shop'] = Auth::user()->id;
        if($photo = $request->file('image')){
            $input['image'] = $this->image($photo,'products');
        }
        Product::create($input);
        \Session::flash('success', 'Product has been inserted successfully!');
        return redirect('admin/products');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $data['menu']="Products";
        $data['products'] = Product::findorFail($id);
        $data['category'] = Category::where('status','active')->pluck('name','id')->prepend('Please Select','');
        return view('admin.products.edit',$data);
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
            'status'=>'required',
        ]);
        $input = $request->all();
        $products = Product::findorFail($id);
        if($photo = $request->file('image')){
            if(!empty($products['image']) && file_exists($products['image'])){
                unlink($products['image']);
            }
            $input['image'] = $this->image($photo,'products');
        }
        $products->update($input);

        \Session::flash('success','Product has been updated successfully!');
        return redirect('admin/products');
    }

    public function destroy($id){
        $products = Product::findOrFail($id);
        if(!empty($products)){
            if(!empty($products['image']) && file_exists($products['image'])){
                unlink($products['image']);
            }
        }
        $products->delete();
        \Session::flash('danger','Product has been deleted successfully!');
        return redirect('admin/products');
    }

    public function assign(Request $request){
        $products = Product::findorFail($request['id']);
        $products['status'] = "active";
        $products->update($request->all());
    }

    public function unassign(Request $request){
        $products = Product::findorFail($request['id']);
        $products['status'] = "inactive";
        $products->update($request->all());
    }
}
