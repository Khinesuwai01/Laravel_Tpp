<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoryCotroller;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/indexs', function () {
    return view('indexs');
});

Route::get('/list', function () {
    return view('list');
})->name('list');

Route::get('test/{id}', function($id){
    return 'Hello Test' . '' . $id;
});

// Route::get('category', function(){
//     return view('category.index');
// });

Route::get('category',[CategoryCotroller::class,'index'])-> name('categoryIndex');
Route::get('category/create',[CategoryCotroller::class,'create'])-> name('categoryCreate');
Route::post('category/store',[CategoryCotroller::class,'store'])->name('categoryStore');
Route::get('category/{id}/edit',[CategoryCotroller::class,'edit'])-> name('categoryEdit');
Route::patch('category/{id}',[CategoryCotroller::class,'update'])-> name('categoryUpdate');
Route::post('category/{id}',[CategoryCotroller::class,'delete'])-> name('categoryDelete');

Route::get('product',[ProductController::class,'product'])-> name('productProduct');
Route::get('product/create',[ProductController::class,'create'])-> name('productCreate');
Route::post('product/store',[ProductController::class,'store'])->name('productStore');
Route::get('product/{id}/edit',[ProductController::class,'edit'])-> name('productEdit');
Route::patch('product/{id}',[ProductController::class,'update'])-> name('productUpdate');
Route::post('product/{id}',[ProductController::class,'delete'])-> name('productDelete');


Route::resource('/articles', ArticlesController::class);

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('permissions', PermissionController::class);
Route::get('permissions/{permissionId}/delete',[ PermissionController::class, 'destroy']);

Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/delete',[ RoleController::class, 'destroy']);
Route::get('roles/{roleId}/give-permissions',[ RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions',[ RoleController::class, 'givePermissionToRole']);

Route::get('students',[StudentController::class,'index'])-> name('student.index');
Route::post('students/store',[StudentController::class,'store'])->name('student.store');
Route::get('students/create',[StudentController::class,'create'])-> name('student.create');
Route::get('students/{id}/edit',[StudentController::class,'edit'])-> name('student.edit');
Route::patch('students/update/{id}',[StudentController::class,'update'])-> name('student.update');
Route::post('students/{id}',[StudentController::class,'delete'])-> name('student.delete');

Route::get('courses', [CoursesController::class, 'course'])-> name('allCourses');
Route::post('courses/store',[CoursesController::class,'store'])->name('course.store');
Route::get('courses/create', [CoursesController::class, 'create'])-> name('student.course-create');

Route::resource('users', UserController::class);
Route::get('users/{userID}/delete', [UserController::class,'destroy']);
// Route::resource('courses', CoursesController::class);
