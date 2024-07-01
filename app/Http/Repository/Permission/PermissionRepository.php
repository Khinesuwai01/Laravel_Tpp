<?php

namespace App\Http\Repository\Permission;

use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function get()
    {
        return Permission::all();
    }

    public function findById($permissionId)
    {
        return Permission::find($permissionId);
    }
}