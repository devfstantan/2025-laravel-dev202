@extends('layout-classic')
@section('title', 'Détails Produit')

@section('content')
    <h1>{{ $product->title }}</h1>
    <ul>
        <li>Prix: <x-product-price :value="$product->price" /></li>
        <li>Stock: <x-product-stock :value="$product->stock" /> </li>
         <li>Est publié: {{$product->is_published ? "Oui":"Non"}} </li>
         <li>Date expiration: {{\Carbon\Carbon::parse($product->date_expiration)->format('d-m-Y')}} </li>
        <li>Catégorie: {{$product->category->name}}</li>
    </ul>
@endsection