<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Testimonie;
use Inertia\Inertia;
// use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $teams = Team::where('publish', 'publier')->get();
        return Inertia::render('Site/Home', [
            'teams' => $teams,
        ]);
    }

    public function about(){
        $teams = Team::where('publish', 'publier')->get();
        $testimonies = Testimonie::where('publish', 'publier')->get();
        return Inertia::render('Site/About', [
            'teams' => $teams,
            'testimonies' => $testimonies,
        ]);
    }

    public function session(){
        return Inertia::render('Site/Session');
    }

    public function service(){
        return Inertia::render('Site/Service');
    }

    public function team(){
        $teams = Team::where('publish', 'publier')->get();
        return Inertia::render('Site/Team', [
            'teams' => $teams,
        ]);
    }

    public function gallery(){
        return Inertia::render('Site/Gallery');
    }

    public function bmi(){
        return Inertia::render('Site/Bmi');
    }

    public function contact(){
        return Inertia::render('Site/Contact');
    }
}