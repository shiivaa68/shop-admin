<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::paginate(10);
        return view('admin.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
        $img=$this->ImageUploader1($file,'/uploads/slider/');
        Slider::create([
            'title'=>$request['title'],
            'url'=>$request['url'],
            'image'=>$img,
        ]);
        return redirect(route('slider.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if($request['image']){
            $file=$request['image'];
            //unlink($slider->image) or die('Delete Error');
            $img=$this->ImageUploader1($file,'/uploads/slider/');
        }
        else{
            $img=$slider->image;
        }
        $data=$request->all();
        $data['image']=$img;
        $slider->update($data);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        unlink($slider->image) or die('Delete Error');
        $slider->delete();
        return redirect(route('slider.index'));
    }
}
