<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ResetPasswordController extends Controller
{
    public function reset_password(Request $request, String $token)
    {
        return Inertia::render("Dashboard/Auth/ResetPassword", [
            "token" => $token,
            "email" => $request->email,
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            "token" => ['required'],
            "email" => ['required', 'email', 'exists:users,email'],
            "password" => ['required', 'min:8', 'confirmed'],
        ], [
            "token.required" => "Le token de réinitialisation est manquant.",
            "email.required" => "L'email est obligatoire",
            "email.email" => "L'email doit être valide",
            "email.exists" => "Cet email n'existe pas",
            "password.required" => "Le mot de passe est obligatoire",
            "password.min" => "Le mot de passe doit contenir au moins 8 caractères",
            "password.confirmed" => "Les mots de passe ne correspondent pas",
        ]);
        
        $status = Password::reset(

            $request->only("email", "password", "password_confirmation", "token"),
            
            function ($user, $password) {
                $user->password = Hash::make($password);
                if($user->remember_token) {
                    $user->remember_token = Str::random(60);
                }
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route("login")->with("success", "Votre mot de passe a été réinitialisé avec succès !");
        } else {
            return back()->withErrors([
                "email" => "Le lien de réinitialisation est invalide ou a expiré.",
            ]);
        }
    }
    
}
