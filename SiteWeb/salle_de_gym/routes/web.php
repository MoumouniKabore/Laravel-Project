<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Quand on visite "/", Inertia rend le composant "Home.vue"
// et lui passe la variable "message"
Route::get('/', function () {
    return Inertia::render('Home', [
        'message' => 'Bienvenue sur mon application ! 🎉',
    ]);
})->name('home'); // ->name() permet d'utiliser route('home') avec Ziggy