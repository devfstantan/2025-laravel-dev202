<x-layout title="Liste Utilisateurs">

    {{-- Tableau des catégories --}}
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>CIN</th>
                <th>Ville</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->profile->cin}}
                    </td>
                    <td>
                        {{$user->profile->city}}
                    </td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
