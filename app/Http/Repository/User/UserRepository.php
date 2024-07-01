<?php

namespace App\Http\Repository\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function get()
    {
        return User::all();
    }

    public function findById($userId)
    {
        return User::find($userId);
    }
}