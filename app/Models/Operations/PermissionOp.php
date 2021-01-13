<?php

namespace App\Models\Operations;

use App\Models\Permission;
use App\Models\Role;

class PermissionOp extends Permission
{
    public static function addPermissions($permissions)
    {
        $role = Role::findOrFail($permissions['role_id']);
        if (isset($permissions['permissions'])) {
            $role->syncPermissions($permissions['permissions']);
        } else {
            $permissions = Permission::get();
            foreach ($permissions as $permission) {
                $role->detachPermission($permission->id);
            }
        }
        return true;
    }
}
