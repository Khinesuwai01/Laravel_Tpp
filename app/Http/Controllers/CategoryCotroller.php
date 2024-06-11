<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCotroller extends Controller
{
    public function index()
    {
        $data = Category::all();
        // dd($data);
        return view('category.index', compact('data'));
    }

    public function result(){
        return view('category.result');
    }
}
