<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show signup page
    public function signupShow()
    {
        return view('auth.signup');
    }

    // handle signup form submit
    public function signupStore(Request $request)
    {
        // 1- valider le formulaire
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        // 2- créer l'utilisateur
        $user = User::create($validated);
        // 3- connecter l'utilisateur
        Auth::login($user);
        // 4- redériger vers la liste des produits
        return to_route('products.index');
    }

    // show login page
    public function loginShow()
    {
        return view('auth.login');
    }
    // handle login submit
    public function loginStore(Request $request)
    {
        // 1- valider le formulaire
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // 2- connecter l'utilisateur
        $loggedin = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
         ]);
         if(! $loggedin){
            return back()->with('error','email ou mot de passe incorrecte');
         }

        // 3- redériger vers la liste des produits
        return to_route('products.index');
    }

    // handle logout action
    public function logout() {
        Auth::logout();
        return to_route('login');
    }
}
