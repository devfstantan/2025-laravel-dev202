<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'welcome')->name('home');


Route::get('/products',function(){
    $title = "Liste des produits";
    $intro = "<p>lorem ipsum dolor <b>dldld </b> lorme <br> lorem lorme </p>";
    
    $products = [
        [
            'id' => 1,
            'title' => "Product 1",
            'price' => 199,
            'stock' => 20,
        ],
        [
            'id' => 2,
            'title' => "Product 2",
            'price' => 299,
            'stock' => 5,
        ],
        [
            'id' => 3,
            'title' => "Product 3",
            'price' => 399,
            'stock' => 0,
        ],
        [
            'id' => 4,
            'title' => "Product 4",
            'price' => 499,
            'stock' => 5,
        ],
        [
            'id' => 5,
            'title' => "Product 5",
            'price' => 599,
            'stock' => 25,
        ],
        [
            'id' => 6,
            'title' => "Product 6",
            'price' => 699,
            'stock' => 30,
        ],
        [
            'id' => 7,
            'title' => "Product 7",
            'price' => 799,
            'stock' => 35,
        ],
        [
            'id' => 8,
            'title' => "Product 8",
            'price' => 899,
            'stock' => 40,
        ],
        [
            'id' => 9,
            'title' => "Product 9",
            'price' => 999,
            'stock' => 45,
        ],
        [
            'id' => 10,
            'title' => "Product 10",
            'price' => 1099,
            'stock' => 50,
        ],
        [
            'id' => 11,
            'title' => "Product 11",
            'price' => 1199,
            'stock' => 55,
        ]
    ];
    $emptyProducts = [];

    return view('products.index',[
        'title' => $title,
        'intro' => $intro,
        'products' => $products
    ]);
})->name('products.index' );


