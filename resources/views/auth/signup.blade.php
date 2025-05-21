<x-layout title="Inscription">
    {{-- Formulaire --}}
    <form action="{{route('auth.signup.store')}}" method="POST">
        @csrf
        
         {{-- name --}}
        <div>
            <label for="name">Nom</label>
            <input type="text" value="{{ old('name') }}" name="name" placeholder="saisir votre nom">
            @error('name')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
         {{-- email --}}
        <div>
            <label for="email">Email</label>
            <input type="email" value="{{ old('email') }}" name="email" placeholder="saisir votre adresse email">
            @error('email')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
         {{-- mot de passe --}}
        <div>
            <label for="password">Mot de passe</label>
            <input type="password"  name="password" placeholder="saisir votre mot de passe">
            @error('password')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
         {{-- confirmation mot de passe --}}
        <div>
            <label for="password_confirmation">Confirmer mot de passe</label>
            <input type="password"  name="password_confirmation" placeholder="confirmer votre mot de passe">
            @error('password_confirmation')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" value="Inscription">
    </form>
</x-layout>
