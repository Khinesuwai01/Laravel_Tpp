<?php

namespace App\Http\Repository\Article;

use App\Models\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function get()
    {
        return Article::all();
    }

    public function findByID($articleId)
    {
        return Article::find($articleId);
    }
}