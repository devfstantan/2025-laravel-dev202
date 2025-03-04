<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="/style.css">

    <title>Document</title>
    
</head>

<body>
    <h1>{{ $title }}</h1>
    {!! $intro !!} {{-- disable text escape --}}
    

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
                    <tr 
                    @class([
                        'line-white' => $loop->odd, 
                        'line-gray' => $loop->even
                    ])
                    >
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['title'] }}</td>
                        <td>{{ $product['price'] }} MAD</td>
                        <td>
                            <span @class([
                                'stock',
                                'stock-success' => $product['stock'] > 10,
                                'stock-warning' => $product['stock'] >= 1 && $product['stock'] <= 10,
                                'stock-danger' => $product['stock'] <= 0,
                            ])>{{ $product['stock'] }} unités
                            </span>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun Produit</p>
    @endif


</body>

</html>
