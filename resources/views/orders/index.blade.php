<x-layout title="Liste Commandes">

    {{-- Tableau des commandes --}}
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>tel</th>
                <th>Prix Total</th>
                <th>état</th>
                <th>Nombre Produits</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>
                        {{$order->tel}}
                    </td>
                    <td>
                        {{$order->status}}
                    </td>
                    <td>
                        {{$order->products_count}}
                    </td>
                    <td>
                        <a href="{{route('orders.show',$order)}}">
                            Afficher
                        </a>
                    </td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
