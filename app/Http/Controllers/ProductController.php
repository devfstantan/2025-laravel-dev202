<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

        // 1- types résultats:
        // get() : liste
        // $data = DB::table('products')->get();

        // first(): 1 seul element le premier
        // $data = DB::table('products')->where('id',10)->first();

        // agrégations: count(); max() ...
        // $data = DB::table('products')->count();
        // $data = DB::table('products')->max('price');

        // exists(): vérifier l'éxistance:
        // $data = DB::table('products')->where("price",'<',0)->exists();

        // SELECT
        // $data = DB::table('products')
        // ->select('title','price')
        // ->get();

        // $data = DB::table('products')
        // ->selectRaw('category_id, count(*) as nbr')
        // ->groupBy('category_id')
        // ->get();

        // WHERE
        // opérateurs: 
        // = , <>, >, >=, <, <= , LIKE,...
        // $data = DB::table('products')
        // ->where('status','pending')
        // ->get();

        // where: status = 'pending' and price < 10
        // $data = DB::table('products')
        // ->where('status','pending')
        // ->where('price','<', 10)
        // ->get();
        // $data = DB::table('products')
        //     ->where([
        //         ['status', 'pending'],
        //         ['price', '<', 10]
        //     ])
        //     ->get();

        // where: status = 'published' or is_published = false
        // $data = DB::table('products')
        // ->where( 'status','published')
        // ->orWhere('is_published',false)
        // ->get();

        // $data = DB::table('products')
        //     ->whereNull('date_expiration')
        //     ->get();

        // ORderBy: 
        // liste produits du  plus récents
        // $data = DB::table('products')
        // ->orderBy('created_at','desc')
        // ->get();

        // liste produits du plus chère chère:
        // les produits avec le mème prix : seront trié par titre.
        // $data = DB::table('products')
        // ->orderBy('price','desc')
        // ->orderBy('title')
        // ->get();

        //  liste produits du  plus récents
        // $data = DB::table('products')
        //     ->latest()
        //     ->get();

        // Le produit le plus chére:
        // $data = DB::table('products')
        //     ->latest('price')
        //     ->first();

        // lister les états ayant un nombre de produits > 10.
        // $data = DB::table('products')
        // ->selectRaw('status , count(*) as nb_products')
        // ->groupBy('status')
        // ->having('nb_products','>',10)
        // ->get();

        // lister les états ayant au moins 3 produits publiés
        $data = DB::table('products')
        ->selectRaw('status , count(*) as nb_products')
        ->where('is_published',true)
        ->groupBy('status')
        ->having('nb_products','>',3)
        ->get();
        dd($data);

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

        return view('products.index', compact('title', 'intro', 'products'));
    }

    public function create() {}
}
