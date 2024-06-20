<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoryCotroller;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('test/{id}', function($id){
    return 'Hello Test' . '' . $id;
});

// Route::get('category', function(){
//     return view('category.index');
// });

Route::get('category',[CategoryCotroller::class,'index'])-> name('categoryIndex')->middleware('auth');
Route::get('category/create',[CategoryCotroller::class,'create'])-> name('categoryCreate')->middleware('auth');
Route::post('category/store',[CategoryCotroller::class,'store'])->name('categoryStore')->middleware('auth');
Route::get('category/{id}/edit',[CategoryCotroller::class,'edit'])-> name('categoryEdit')->middleware('auth');
Route::patch('category/{id}',[CategoryCotroller::class,'update'])-> name('categoryUpdate')->middleware('auth');
Route::post('category/{id}',[CategoryCotroller::class,'delete'])-> name('categoryDelete')->middleware('auth');

Route::get('product',[ProductController::class,'product'])-> name('productProduct')->middleware('auth');
Route::get('product/create',[ProductController::class,'create'])-> name('productCreate')->middleware('auth');
Route::post('product/store',[ProductController::class,'store'])->name('productStore')->middleware('auth');
Route::get('product/{id}/edit',[ProductController::class,'edit'])-> name('productEdit')->middleware('auth');
Route::patch('product/update/{id}',[ProductController::class,'update'])-> name('productUpdate')->middleware('auth');
Route::post('product/{id}',[ProductController::class,'delete'])-> name('productDelete')->middleware('auth');


Route::resource('/articles', ArticlesController::class)->middleware('auth');

Auth::routes();
// Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
