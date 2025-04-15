@extends('layout-classic')
@section('title', 'Nouveau Produit')

@section('content')
    <h1>Nouveau Produit</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        {{-- title --}}
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" placeholder="saisir le titre">
        </div>
        {{-- price --}}
        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" placeholder="saisir le prix">
        </div>
        {{-- stock --}}
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" placeholder="saisir le stock">
        </div>
        {{-- is_published --}}
        <div>
            <input type="checkbox" name="is_published" id="is_published">
            <label for="is_published">Est Publié</label>
        </div>
         {{-- date expiration --}}
         <div>
             <label for="date_expiration">Date expiration</label>
             <input type="date" name="date_expiration" id="date_expiration">
        </div>
         {{-- catégorie --}}
         <div>
            <label for="category_id">catégorie</label>
            <select name="category_id" id="category_id">
                <option value="">Choisir une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Ajouter">
    </form>
@endsection
