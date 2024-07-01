<?php

namespace App\Http\Repository\User;

interface UserRepositoryInterface
{
    public function get();

    public function findById($id);
}