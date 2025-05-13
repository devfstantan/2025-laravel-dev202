@extends('layout-classic')
@section('title', 'Nouveau Produit')

@section('content')
    <h1>Nouveau Produit</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        {{-- title --}}
        <div>
            <label for="title">Titre</label>
            <input type="text" value="{{ old('title') }}" name="title" placeholder="saisir le titre">
            @error('title')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        {{-- price --}}
        <div>
            <label for="price">Prix</label>
            <input type="number" value="{{ old('price') }}" name="price" placeholder="saisir le prix">
            @error('price')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        {{-- stock --}}
        <div>
            <label for="stock">Stock</label>
            <input type="number" value="{{ old('stock') }}" name="stock" placeholder="saisir le stock">
            @error('stock')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        {{-- is_published --}}
        <div>
            <input type="checkbox" @checked(old('is_published')) name="is_published" id="is_published">
            <label for="is_published">Est Publié</label>
        </div>
        {{-- date expiration --}}
        <div>
            <label for="date_expiration">Date expiration</label>
            <input type="date" value="{{ old('date_expiration') }}" name="date_expiration" id="date_expiration">
            @error('date_expiration')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        {{-- catégorie --}}
        <div>
            <label for="category_id">catégorie</label>
            <select name="category_id" id="category_id">
                <option value="">Choisir une catégorie</option>
                @foreach ($categories as $category)
                    <option 
                        value="{{ $category->id }}"
                        @selected($category->id == old('category_id'))
                        >{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" value="Ajouter">
    </form>
@endsection
