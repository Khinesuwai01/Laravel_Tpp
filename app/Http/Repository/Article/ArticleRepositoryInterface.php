<?php

namespace App\Http\Repository\Article;

interface ArticleRepositoryInterface
{
    public function get();

    public function findByID($id);
}