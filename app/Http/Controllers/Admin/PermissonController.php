<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permisson;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissonRequest;
use App\Http\Requests\UpdatePermissonRequest;

class PermissonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissonRequest $request)
    {
        $inputs = $request->all();
        Permission::create($inputs);
        return to_route('admin.permission.index')->with('swal-success', 'دسترسی با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permisson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissonRequest $request, Permission $permission)
    {
        $inputs = $request->all();
        $permission->update($inputs);
        return to_route('admin.permission.index')->with('swal-success', 'دسترسی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('swal-success', 'دسترسی با موفقیت حذف شد .');
    }
}
