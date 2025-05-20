@extends('layout-classic')
@section('title', 'modifier Produit')

@section('content')
    <form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- title --}}
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" placeholder="saisir le titre" value="{{$product->title}}">
            @error('title')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        {{-- price --}}
        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" placeholder="saisir le prix" value="{{$product->price }}">
            @error('price')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        {{-- stock --}}
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" placeholder="saisir le stock" value="{{$product->stock}}">
            @error('stock')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        {{-- is_published --}}
        <div>
            <input type="checkbox" name="is_published" id="is_published" @checked($product->is_published)>
            <label for="is_published">Est Publié</label>
        </div>
         {{-- date expiration --}}
         <div>
             <label for="date_expiration">Date expiration</label>
             <input type="date" name="date_expiration" id="date_expiration" 
                    value="{{\Carbon\Carbon::parse($product->date_expiration)->format('Y-m-d')}}"
            >
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
                    <option value="{{$category->id}}" @selected($product->category_id == $category->id)>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
         {{-- Image --}}
        <div>
            <label for="image">Image du produit</label>
            @isset($product->image)
                <img src="{{asset('/storage/'.$product->image)}}" alt="">   
            @endisset
            <input type="file" value="{{ old('image') }}" name="image" id="image" accept="image/*">
            @error('image')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" value="Sauvegarder">
    </form>
@endsection
