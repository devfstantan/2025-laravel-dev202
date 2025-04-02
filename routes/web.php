<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'welcome')->name('home');


// Route::get('/products',[ProductController::class, 'index'])
// ->name('products.index' );
// Route::get('/products/create',[ProductController::class, 'create'])
// ->name('products.create' );

Route::resource("/categories",CategoryController::class);
// ->except(['create','store']);
// ->only(['index','show']);

