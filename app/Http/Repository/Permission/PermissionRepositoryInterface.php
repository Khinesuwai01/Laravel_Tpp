<?php 

namespace App\Http\Repository\Permission;

interface PermissionRepositoryInterface
{
    public function get();

    public function findById($id);
}