<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->paginate(20);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::where('chid','!=',0)->get();
        return view('admin.product.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request['image'];
        $img=$this->ImageUploader($file);
        $user_id=auth()->user()->id;
        Product::create([
            'name'=>$request['name'],
            'brand'=>$request['brand'],
            'body'=>$request['body'],
            'discount'=>$request['discount'],
            'price'=>$request['price'],
            'image'=>$img,
            'cat'=>$request['cat'],
            'status'=>$request['status'],
            'count'=>$request['count'],
            'user_id'=>$user_id,
        ]);
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(Gate::allows('edit_product',$product)){
            return view('admin.product.edit',compact('product'));
        }
        else{
            return "<h1>شما اجازه دسترسی به این بخش را ندارید</h1>";
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data=$request->all();
        $product->update($data);
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'));
    }

    public function gallery(Request $request)
    {
        $id=$request->get('id');
        $product=Product::findOrFail($id);
        $image=ProductImage::where('product_id',$id)->get();
        return view('admin.product.gallery',compact('product','image'));
    }
    public function upload(Request $request)
    {
        $id=$request->get('id');
        $files=$request->file('file');
        $name=rand()."-".$id."-".$files->getClientOriginalName();
        if($files->move('uploads/gallery',$name)){
            $ProductImage=new ProductImage();
            $ProductImage->product_id=$id;
            $ProductImage->url=$name;
            $ProductImage->save();
        }
    }
}
