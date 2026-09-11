<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Team;
use App\Models\Testimonie;
use Inertia\Inertia;
// use Illuminate\Http\Request;

class DashViewController extends Controller
{
    public function dashboard_home(){
        $teams = Team::all();
        $appointments = Appointment::latest()->where('statut', 'non lu')->get();
        $avis_graphiques = Testimonie::selectRaw('star, COUNT(*) as total')->groupBy('star')->get();
        return Inertia::render('Dashboard/Home', [
            'avis_graphiques' => $avis_graphiques,
            'teams' => $teams,
            'appointments' => $appointments,
        ]);
    }

    public function appointments_all(){
        return Inertia::render('Dashboard/Appointments/All');
    }

    public function appointments_view(){
        return Inertia::render('Dashboard/Appointments/View');
    }

    public function messages_all(){
        return Inertia::render('Dashboard/Messages/All');
    }

    public function messages_view(){
        return Inertia::render('Dashboard/Messages/View');
    }

    public function teams_add(){
        return Inertia::render('Dashboard/Teams/Add');
    }

    public function teams_all(){
        return Inertia::render('Dashboard/Teams/All');
    }

    public function teams_edit(){
        return Inertia::render('Dashboard/Teams/Edit');
    }

    public function teams_view(){
        return Inertia::render('Dashboard/Teams/View');
    }

    public function testimonies_all(){
        return Inertia::render('Dashboard/Testimonies/All');
    }

    public function testimonies_view(){
        return Inertia::render('Dashboard/Testimonies/View');
    }
}
