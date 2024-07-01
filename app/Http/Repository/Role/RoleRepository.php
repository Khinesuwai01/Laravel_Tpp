<?php

namespace App\Http\Repository\Role;

use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function get()
    {
        return Role::all();
    }

    public function findById($roleId)
    {
        return Role::find($roleId);
    }
}