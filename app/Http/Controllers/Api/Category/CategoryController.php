<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' =>$request->name
        ]);
        return response()->json($category);
    }

    public function show($id)
    {
        $category = Category::find($id);

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name
        ]);

        return response()->json($category);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return response()->json($category);
    }

    
    
}
