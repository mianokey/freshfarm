<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


  

Auth::routes();

  

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

  

Route::group(['middleware' => ['auth']], function() {

    Route::resource('admin/roles', App\Http\Controllers\RoleController::class);

    Route::resource('admin/users', App\Http\Controllers\UserController::class);

    Route::resource('products', App\Http\Controllers\ProductController::class);
});


Route::group(['middleware' => ['auth']], function() {
    Route::get('admin', [App\Http\Controllers\AdminController::class, 'showanimals'])->name('animal.index');   
});


//route for animal view
Route::group(['middleware' => ['auth']], function() {
    Route::get('admin/cat/animal', [App\Http\Controllers\AdminController::class, 'showanimals'])->name('animal.index');
    Route::get('admin/cat/animal/create', [App\Http\Controllers\AdminController::class, 'create'])->name('animal.admin_create');
    Route::get('user/cat/animal/create', [App\Http\Controllers\AnimalController::class, 'create'])->name('animal.create');
    Route::post('user/cat/animal/store', [App\Http\Controllers\AnimalController::class, 'store'])->name('animal.store');
    Route::get('admin/cat/animal/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('animal.admin_edit');
    Route::put('admin/category/animal/{id}/update', [App\Http\Controllers\AnimalController::class, 'update'])->name('animal.update'); 
    Route::get('admin/category/animal/{id}/delete', [App\Http\Controllers\AnimalController::class, 'destroy'])->name('animal.delete');    
});

Route::group(['middleware' => ['auth']], function() {
    //choose option
    Route::post('/category',[App\Http\Controllers\OptionController::class,'chooseOption'])->name('category');
    Route::get('/product',[App\Http\Controllers\HomeController::class,'product'])->name('home.product'); 
    Route::get('/product/animal/index',[App\Http\Controllers\HomeController::class,'product'])->name('home.product');    
});
