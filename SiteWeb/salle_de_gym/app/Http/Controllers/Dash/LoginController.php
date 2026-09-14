<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login(){
        return Inertia::render('Dashboard/Auth/Login');
    }
    
    public function login_post(Request $request) {   

        $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required', 'min:8'],
            "remember" => ['boolean'],
        ], [
            "email.required" => "L'email est obligatoire",
            "email.email" => "L'email doit être valide",
            "password.required" => "Le mot de passe est obligatoire",
            "password.min" => "Le mot de passe doit contenir au moins 8 caractères",
        ]);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $remember = $request->boolean("remember");
        
        if (Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();

            if (Auth::user()->email_verified_at === null) {
                $request->user()->sendEmailVerificationNotification();
                return redirect()->route('verification.notice');
            } else {
                return redirect()->route("dashboard.home")->with("success", "Vous êtes connecté !");                
            }

        } else {
            return back()->withErrors([
                "email" => "Ces identifiants ne correspondent pas.",
            ])->onlyInput("email");
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Vous êtes déconnecté !');
    }
}
