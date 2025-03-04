<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .stock {
            padding: 8px 12px;
            border-radius: 8px;
            display: inline-block
        }

        .stock-success {
            color: white;
            background-color: green;
        }

        .stock-warning {
            color: black;
            background-color: orange;
        }

        .stock-danger {
            color: white;
            background-color: red;
        }
        .line-white{
            background: white;
        }
        .line-gray{
            background-color: #eee;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    {!! $intro !!} {{-- disable text escape --}}
    time: {{ time() }}

    <h2>List :</h2>
    @if (count($products) == 0)
        <p>Aucun Produit</p>
    @endif


    {{-- Conditions --}}
    @php
        $stock = 0;
    @endphp
    @if ($stock > 10)
        <span> En Stock</span>
    @elseif($stock > 0)
        <span>Stock Limit</span>
    @else
        <span>Hors Stock</span>
    @endif

    {{-- Connexion --}}
    @auth
        <p>Je suis un utilisateur connecté</p>
    @else
        <p>Auth: Je ne suis pas connecté</p>
    @endauth

    @guest
        <p>Guest: je suis un guest (je ne suis pas connecté) </p>
    @else
        <p>Guest: je ne suis pas guest (je suis connecté)</p>
    @endguest

    {{-- isset() --}}
    @php
        $v = 3;
    @endphp

    @isset($v)
        <p>variable $v is set</p>
    @else
        <p>variable $v is not set</p>
    @endisset



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
