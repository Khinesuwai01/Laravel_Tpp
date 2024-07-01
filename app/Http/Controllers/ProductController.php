<?php

namespace App\Http\Controllers;

use App\Http\Repository\Product\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    public function product()
    {
        $data = $this->productRepository->get();
        // dd($data);
        return view('product.product',compact('data'));
    }
    public function create(){
        return view(('product.create'));
    }
    public function store(Request $request){
        // $data = $request->all();
        // dd($data);
        Product::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'color'=> $request->color,
            'image'=>$request->image,
        ]);
        return Redirect::route('productProduct');
    }
    public function edit($id){
        // $data = Product::where('id', $id)->first();
        // return view('product.edit', compact('data'));
        $data = $this->productRepository->findById($id);
        return view('product.edit', compact('data'));
    }
    public function update(Request $request, $id){
        // $data = Product::where('id', $id)->first();
        // $data->name =   $request->name;
        // $data->price = $request->price;
        // $data->color = $request->color;
        // $data->image = $request->image;

        // $data->update();

        // return redirect()->route('productProduct');
        $data = $this->productRepository->findById($id);
        $data->name =   $request->name;
        $data->price = $request->price;
        $data->color = $request->color;
        $data->image = $request->image;

        $data->update();
        return redirect()->route('productProduct');
    }
    public function delete($id){
        // $data = Product::where('id', $id)->first();
        // $data->delete();
        // return redirect()->route('productProduct');

        $data = $this->productRepository->findById($id);
        $data->delete();
        return redirect()->route('productProduct');
    }
}
