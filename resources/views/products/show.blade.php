@extends('layout-classic')
@section('title', 'Détails Produit')

@section('content')
    <h1>{{ $product->title }}</h1>
    <ul>
        <li>Prix: <x-product-price :value="$product->price" /></li>
        <li>Stock: <x-product-stock :value="$product->stock" /> </li>
         <li>Est publié: {{$product->is_published ? "Oui":"Non"}} </li>
         <li>Date expiration: {{\Carbon\Carbon::parse($product->date_expiration)->format('d-m-Y')}} </li>
        <li>Catégorie: 
            @isset($product->category)
             {{$product->category->name}}
            @endisset
        </li>
        <li>
            <img src="{{asset('/storage/'.$product->image)}}" alt="">
        </li>
    </ul>
@endsection