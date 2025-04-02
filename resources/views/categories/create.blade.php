<x-layout title="Nouvelle Catégorie">
    {{-- Formulaire --}}
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <input type="text" name="name">
        <input type="submit" value="Ajouter">
    </form>
</x-layout>
