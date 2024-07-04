<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name' =>$request->name,
            'price'=>$request->price,
            'color'=>$request->color,
            'image'=>$request->image

        ]);
        return response()->json($product);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'price'=>$request->price,
            'color'=>$request->color,
            'image'=>$request->image
        ]);

        return response()->json($product);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json($product);
    }

    
    
}
