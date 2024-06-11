<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $data = Product::all();
        // dd($data);
        return view('product.product',compact('data'));
    }
    
}
