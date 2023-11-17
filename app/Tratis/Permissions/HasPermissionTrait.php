<?php 

namespace App\Tratis\Permissions;

use App\Models\Role;
use App\Models\Permission;

trait HasPermissionTrait{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    protected function hasPermission($permission)
    {
        return (bool) $this->permissions->where("name",$permission->name)->count();
    }

    public function hasRole(...$roles)
    {
        foreach ($roles as $role)
        {
            if ($this->roles->contains('name',$role)){
                {
                    return true;
                }
            }
        }
        return false;
    }

    
    public function hasPermissionTo($permission)
    {
        return $this->hasPermission($permission) || $this->HasPermissionThroughRole($permission);
    }


    public function HasPermissionThroughRole($permission)
    {
        foreach($permission->roles as $role)
        {
            if($this->roles->contains($role)){
                return true;
            }
        }
        return false;
    }
}