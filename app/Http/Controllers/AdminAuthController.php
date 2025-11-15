<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion pour l'administrateur.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showLoginForm()
    {
        // Si l'admin est déjà connecté, on le redirige vers le tableau de bord.
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.categories.index');
        }

        // Assurez-vous que cette vue existe : resources/views/admin/auth/login.blade.php
        return view('admin.auth.login');
    }

    /**
     * Gère la tentative de connexion de l'administrateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // C'est la ligne la plus importante : on spécifie le guard 'admin'.
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            // Redirige vers la première page de l'admin après connexion.
            return redirect()->intended(route('admin.categories.index'));
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l'administrateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirige vers la page d'accueil du site public.
    }
}