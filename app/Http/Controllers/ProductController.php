<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $data = [
            [
                'Hoodie',
                '30000',
                'Black,White'
            ],
            [
                'Sneaker(Air)',
                '55000',
                'White'
            ],
            [
                'T-Shirt',
                '20000',
                'Black,White,Blue'
            ],
        ];
        return view('product.product',compact('data'));
    }
    
}
