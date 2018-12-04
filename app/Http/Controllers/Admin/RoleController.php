<?php

namespace App\Http\Controllers\Admin;


use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::latest()->paginate(20);
        return view('admin.role.index',compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::latest()->get();
        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=Role::create([
            'name'=>$request['name'],
            'title'=>$request['title'],
        ]);
        $role->permissions()->sync($request->input('permission_id'));
        return redirect(route('role.index'));
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
    public function edit(Role $role)
    {
        return view('admin.role.edit',compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data=$request->all();
        $role->update($data);
        return redirect(route('role.index'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('role.index'));
    }
}
