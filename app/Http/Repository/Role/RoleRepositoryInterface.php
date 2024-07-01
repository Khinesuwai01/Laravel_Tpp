<?php

namespace App\Http\Repository\Role;

interface RoleRepositoryInterface
{
    public function get();

    public function findById($id);
}