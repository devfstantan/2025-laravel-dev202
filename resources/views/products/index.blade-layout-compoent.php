<x-layout title="List Products">
    <x-card>
        <h1>{{ $title }}</h1>
        {!! $intro !!} {{-- disable text escape --}}

        <div>
            <x-button class=" btn-primary" onclick="alert('ddd')">CLick me</x-button>
            <x-button class=" btn-secondary" disabled>CLick me</x-button>
        </div>
    </x-card>
    {{-- Tableau des produits --}}
    @if (isset($products) && count($products) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr @class([
                        'line-white' => $loop->odd,
                        'line-gray' => $loop->even,
                    ])>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['title'] }}</td>
                        <td>
                            <x-product-price :value="$product['price']" currency="$" />
                        </td>
                        <td>
                            <x-product-stock :value="$product['stock']" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun Produit</p>
    @endif
</x-layout>
