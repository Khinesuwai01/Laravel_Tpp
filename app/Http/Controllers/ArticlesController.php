<?php

namespace App\Http\Controllers;

use App\Http\Repository\Article\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArticlesController extends Controller
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = $this->articleRepository->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Article::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'image'=>$request->image,
        ]);
        return Redirect::route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $articles = $this->articleRepository->findByID($id);
        return view('article.edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articles = $this->articleRepository->findByID($id);
        $articles->name =  $request->name;
        $articles->price = $request->price;
        $articles->image = $request->image;
        $articles->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'image'=>$request->image
        ]);

        $articles->update();
        return Redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articles = $this->articleRepository->findByID($id);
        $articles->delete();
        return Redirect()->route('articles.index');
    }
}
