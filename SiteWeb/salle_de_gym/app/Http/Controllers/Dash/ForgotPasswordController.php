<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Inertia\Inertia;

class ForgotPasswordController extends Controller
{
    public function forgot_password()
    {
        return Inertia::render('Dashboard/Auth/ForgotPassword');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            "email.required" => "L'email est obligatoire",
            "email.email" => "L'email doit être valide",
            "email.exists" => "Ce email n'est pas correct.",
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with("success", "Un lien de réinitialisation a été envoyé à votre email !");
        } else {
            return back()->withErrors([
                "email" => "Impossible d'envoyer le lien de réinitialisation.",
            ]);
        }
    }
}
