<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'welcome')->name('home');

// Route::get('/hello',function(){
//     return view('hello');
// });

Route::view('/hello', 'hello')->name('hello');
Route::redirect('/hello-old', '/hello', 301);


// Post d'un formulaire:
Route::post('/login', function (Request $request) {
    $username = $request->username;
    $pwd = $request->pwd;

    return "Login $username / $pwd";
})->name('login');

Route::prefix('/products')
    ->name('products.')
    ->group(function () {
        // Page Produit
        Route::get('/{id}', function (int $id) {
            return "Product $id";
        })->where('id', '[0-9]+')->name('show');

        // Page pour une image  d'un produit
        // productID et imageID sont obligatoires
        Route::get(
            '/{productId}/images/{imageId}',
            function (int $productId, int $imageId) {
                return "Product $productId image : $imageId";
            }
        )->name('image');

        /**
         * productId: obligatoir
         * network: optionnel (par défaut facebook)
         */
        Route::get(
            '/{productId}/share/{network?}',
            function (int $productId, string $network = "facebook") {
                return "Product $productId network : $network";
            }
        )->name('share');
    });
