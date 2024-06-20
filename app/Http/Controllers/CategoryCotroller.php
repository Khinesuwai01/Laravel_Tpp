<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

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
    public function create(){
        return view(('category.create'));
    }
    public function store(CategoryRequest $request){
        // $data = $request->all();
        // dd($data);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'body' => ['required'],
            // 'image' => ['nullable', 'mimes:png.jpg']
        ]);

        Category::create([
            'name'=> $request->name
        ]);
        return Redirect::route('categoryIndex');
    }
    public function edit($id){
        $data = Category::where('id', $id)->first();
        return view('category.edit', compact('data'));
    }
    public function update(Request $request, $id){
        $data = Category::where('id', $id)->first();
        $data->name =   $request->name;

        $data->update([
            'name'=> $request->name
        ]

        );

        return redirect()->route('categoryIndex');

    }
    public function delete($id){
        $data = Category::where('id', $id)->first();
        $data->delete();
        return redirect()->route('categoryIndex');
    }
}
