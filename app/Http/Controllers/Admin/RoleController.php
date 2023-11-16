<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdatePermissonRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $inputs = $request->all();
        $role = Role::create($inputs);
        $inputs['permission'] = $inputs['permission'] ?? [];
        $role->permissions()->sync($inputs['permission']);
        return to_route('admin.role.index')->with('swal-success', 'نقش با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $inputs = $request->all();
        $role->update($inputs);
        return to_route('admin.role.index')->with('swal-success', 'نقش با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('swal-success', 'نقش با موفقیت حذف شد .');
    }


    public function EditPermission(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.EditPermission',compact('permissions','role'));
    }


    public function UpdatePermission(UpdatePermissonRequest $request, Role $role)
    {
        $inputs = $request->all();
        $inputs['permission'] = $inputs['permission'] ?? [];
        $role->permissions()->sync($inputs['permission']);
        return to_route('admin.role.index')->with('swal-success', 'نقش با موفقیت ویرایش شد');
    }
}
