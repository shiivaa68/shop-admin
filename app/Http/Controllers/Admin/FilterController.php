<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter=Filter::paginate(20);
        return view('admin.filter.index',compact('filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::get();
        $filters=Filter::where('parent_id',0)->get();
        return view('admin.filter.create',compact('cats','filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat_id=$request->get('cat_id');
        $names=$request->get('name');
        $en_names=$request->get('en_name');
        $types=$request->get('type');
        if(is_array($names)){
            foreach ($names as $key => $value){
                $en_name=array_key_exists($key,$en_names) ? $en_names[$key]:'-';
                $type=array_key_exists($key,$types) ? $types[$key]:1;
                Filter::create([
                    'cat_id'=>$cat_id,
                    'name'=>$value,
                    'en_name'=>$en_name,
                    'type'=>$type,
                    'parent_id'=>$request['parent_id'],
                ]);
            }
        }
        return redirect(route('filter.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function show(filter $filter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function edit(filter $filter)
    {
        $cats=Category::get();
        $filters=Filter::where('parent_id',0)->get();
        return view('admin.filter.edit',compact('cats','filters','filter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, filter $filter)
    {
        $data=$request->all();
        $filter->update($data);
        return redirect(route('filter.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function destroy(filter $filter)
    {
        $filter->delete();
        return redirect(route('filter.index'));
    }
}
