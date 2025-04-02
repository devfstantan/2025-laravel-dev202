<x-layout title="Liste Catégories">

    {{-- Tableau des catégories --}}
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>
                    <a href="{{route('categories.create')}}">
                        Nouvelle Catégorie
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>
                        <a href="{{route('categories.show',$cat->id)}}">
                            {{$cat->name}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('categories.edit',$cat->id)}}">Editer</a>
                        <form action="{{route('categories.destroy',$cat->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
