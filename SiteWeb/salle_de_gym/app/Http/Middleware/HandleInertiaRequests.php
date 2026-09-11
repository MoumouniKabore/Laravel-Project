<?php

namespace App\Http\Middleware;

use App\Models\Appointment;
use App\Models\Message;
use App\Models\Team;
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

            'team_non_publier' => Team::where('publish', 'non publier')->count(),
            'team_publier' => Team::where('publish', 'publier')->count(),
            'team_all' => Team::all()->count(),

            'message_non_lu' => Message::where('statut', 'non lu')->count(),
            'message_lu' => Message::where('statut', 'lu')->count(),
            'message_all' => Message::all()->count(),

            'testimonie_non_lu' => Testimonie::where('statut', 'non lu')->count(),
            'testimonie_lu' => Testimonie::where('statut', 'lu')->count(),
            'testimonie_publier' => Testimonie::where('publish', 'publier')->count(),
            'testimonie_star_avg' => Testimonie::avg('star'),
            'testimonie_all' => Testimonie::all()->count(),
            
            'appointment_non_lu' => Appointment::where('statut', 'non lu')->count(),
            'appointment_lu' => Appointment::where('statut', 'lu')->count(),
            'appointment_all' => Appointment::all()->count(),
            
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'id' => fn () => $request->session()->get('flash_id') ?? uniqid(),
            ],
        ];
    }
}