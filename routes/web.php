<?php

use App\Http\Controllers\CategoryCotroller;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('test/{id}', function($id){
    return 'Hello Test' . '' . $id;
});

// Route::get('category', function(){
//     return view('category.index');
// });

Route::get('category',[CategoryCotroller::class,'index'])-> name('categoryIndex');
Route::get('category/create',[CategoryCotroller::class,'create'])-> name('categoryCreate');
Route::get('product',[ProductController::class,'product']);
Route::post('category/store',[CategoryCotroller::class,'store'])->name('categoryStore');
Route::get('category/{id}/edit',[CategoryCotroller::class,'edit'])-> name('categoryEdit');
Route::patch('category/{id}',[CategoryCotroller::class,'update'])-> name('categoryUpdate');
