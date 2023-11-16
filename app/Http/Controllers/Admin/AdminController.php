<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\admin;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function admins()
    {
        $users = User::all()->where('user_type', 1);
        return view('admin.users.admins',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, User $user)
    {
        $inputs = $request->all();
        $user->update($inputs);
        return to_route('admin.users.index')->with('swal-success', 'کاربر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        $user->delete();
        return back()->with('swal-success', 'کاربر با موفقیت حذف شد');
    }


    public function AdminsSet(user $user)
    {
        if($user->user_type === 1)
        {
            $user->user_type = 0;
        }else{
            
            $user->user_type = 1;
        }
        $user->update();
        
        return to_route('admin.users.index')->with('swal-success', 'کاربر با موفقیت ویرایش شد');
    }


    public function Roles(User $user)
    {
        $roles = Role::all();
        $user_roles = $user->roles;
        return view('admin.users.roles',compact('roles','user','user_roles'));
    }


    public function RolesStore(Request $request, User $user)
    {
        $inputs = $request->all();
        $inputs['roles'] = $inputs['roles'] ?? [];

        $validated = $request->validate([
            'roles' => 'exists:roles,id|array',
        ]);

        $user->roles()->sync($request->roles);
        return to_route('admin.users.admins')->with('swal-success', 'نقش های ادمین با موفقیت ویرایش شد');
    }


    public function Permissions(User $user)
    {
        $permissions = Permission::all();
        $user_permissions = $user->permissions;
        return view('admin.users.permissions',compact('permissions','user','user_permissions'));
    }


    public function PermissionsStore(Request $request, User $user)
    {
        $inputs = $request->all();
        $inputs['permission'] = $inputs['permission'] ?? [];

        $validated = $request->validate([
            'permission' => 'exists:permissions,id|array',
        ]);

        $user->permissions()->sync($inputs['permission']);
        return to_route('admin.users.admins')->with('swal-success', 'سطوح های  دسترسی ادمین با موفقیت ویرایش شد');
    }
}
