<x-layout title="Connexion">
    {{-- Formulaire --}}
    <form action="{{route('auth.login.store')}}" method="POST">
        @csrf
        
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
        

        <input type="submit" value="Connexion">
        @if (session('error'))
                <div style="color:red">{{ session('error') }}</div>
        @endif
    </form>
</x-layout>
