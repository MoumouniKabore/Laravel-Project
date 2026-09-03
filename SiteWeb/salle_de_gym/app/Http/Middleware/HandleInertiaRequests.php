<?php

namespace App\Http\Middleware;

use App\Models\Appointment;
use App\Models\Message;
use App\Models\Testimonie;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    // Le template Blade racine utilisé par Inertia
    protected $rootView = 'app';

    // Version des assets (pour le cache busting)
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    // Données partagées avec TOUTES les pages Vue (comme un "global state")
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),

            // Partage les routes Ziggy avec le frontend
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(), // URL actuelle
            ],

            'message_non_lu' => Message::where('statut', 'non lu')->count(),
            'testimonie_non_lu' => Testimonie::where('statut', 'non lu')->count(),
            'appointment_non_lu' => Appointment::where('statut', 'non lu')->count(),
            
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'id' => fn () => $request->session()->get('flash_id') ?? uniqid(),
            ],
        ];
    }
}