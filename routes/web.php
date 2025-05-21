<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::resource('products',ProductController::class);

Route::get('users',[UserController::class, 'index'])
      ->name('users.index');

Route::resource("/orders",OrderController::class)
->only(['index','show']);


// Auth Routes
Route::get('/signup',[AuthController::class, 'signupShow'])
->name('auth.signup.show');
Route::post('/signup',[AuthController::class, 'signupStore'])
->name('auth.signup.store');
Route::get('/login',[AuthController::class, 'loginShow'])
->name('auth.login.show');
Route::post('/login',[AuthController::class, 'loginStore'])
->name('auth.login.store');

Route::post('/logout',[AuthController::class, 'logout'])
->name('auth.logout');