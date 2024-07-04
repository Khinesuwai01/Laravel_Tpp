<?php

use App\Http\Controllers\Api\Article\ArticleController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Product\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('categoryList', [CategoryController::class,'index']);
Route::post('categoryStore', [CategoryController::class,'store']);
Route::get('categoryShow/{id}',[CategoryController::class, 'show']);
Route::post('categoryUpdate/{id}', [CategoryController::class, 'update']);
Route::delete('categoryUpdate/{id}', [CategoryController::class, 'delete']);

Route::get('productList', [ProductController::class,'index']);
Route::post('productStore', [ProductController::class,'store']);
Route::get('productShow/{id}',[ProductController::class, 'show']);
Route::post('productUpdate/{id}', [ProductController::class, 'update']);
Route::delete('productUpdate/{id}', [ProductController::class, 'delete']);

Route::get('articleList', [ArticleController::class,'index']);
Route::post('articleStore',[ArticleController::class,'store']);
Route::get('articleShow/{id}',[ArticleController::class,'show']);
Route::post('articleUpdate/{id}',[ArticleController::class,'update']);
Route::delete('articleUpdate/{id}',[ArticleController::class,'delete']);