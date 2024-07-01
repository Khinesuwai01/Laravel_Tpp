<?php

namespace App\Http\Repository\Category;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function get()
    {
        return Category::all();
    }

    public function findById($categoryId)
    {
        return Category::find($categoryId);
    }
}