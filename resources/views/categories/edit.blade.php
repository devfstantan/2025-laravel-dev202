<x-layout title="Nouvelle Catégorie">
    {{-- Formulaire --}}
    <form action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$category->name}}">
        <input type="submit" value="Enregistrer">
    </form>
</x-layout>
