<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
// use Illuminate\Http\Request;

class DashViewController extends Controller
{
    public function dashboard_home(){
        return Inertia::render('Dashboard/Home');
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
