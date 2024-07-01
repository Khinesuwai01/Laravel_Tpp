<?php

namespace App\Http\Repository\Category;

interface CategoryRepositoryInterface
{
    public function get();

    public function findById($id);
}