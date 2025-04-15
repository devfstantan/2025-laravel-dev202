@extends('layout-classic')
@section('title','List Products')

@section('content')
    {{-- Tableau des produits --}}
    @if (isset($products) && count($products) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Catégorie</th>
                    <th>
                        <a href="{{route('products.create')}}">Nouveau Produit</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr @class([
                        'line-white' => $loop->odd,
                        'line-gray' => $loop->even,
                    ])>
                        <td>{{ $product->id }}</td>
                        <td>
                            <a href="{{route('products.show',$product)}}">
                                {{ $product->title }}
                            </a>
                        </td>
                        <td>
                            <x-product-price :value="$product->price" currency="$" />
                        </td>
                        <td>
                            <x-product-stock :value="$product->stock" />
                        </td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <a href="{{route('products.edit',$product)}}">Editer</a>
                            <form action="{{route('products.destroy',$product)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    @else
        <p>Aucun Produit</p>
    @endif
@endsection
