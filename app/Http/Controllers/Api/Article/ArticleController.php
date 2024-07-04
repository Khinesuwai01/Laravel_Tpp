<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    public function index()
    {
        $article = Article::all();
        return response()->json($article);
    }

    public function store(Request $request)
    {
        $article = Article::create([
            'name' =>$request->name,
            'price'=>$request->price,
            'image'=>$request->image
        ]);
        return response()->json($article);
    }

    public function show($id)
    {
        $article = Article::find($id);

        return response()->json($article);
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->update([
            'name' => $request->name,
            'price'=>$request->price,
            'image'=>$request->image
        ]);

        return response()->json($article);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return response()->json($article);
    }

    
    
}
