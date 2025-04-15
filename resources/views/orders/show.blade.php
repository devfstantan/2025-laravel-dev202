<x-layout title="Détail Commande">

    <ul>
        <li>Téléphone: {{$order->tel}}</li>
        <li>Etat: {{$order->status}}</li>
    </ul>
    {{-- Tableau des produit de la commande --}}
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>titre</th>
                <th>Prix </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        {{$product->title}}
                    </td>
                    <td>
                        {{$product->price}}
                    </td>                  
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
