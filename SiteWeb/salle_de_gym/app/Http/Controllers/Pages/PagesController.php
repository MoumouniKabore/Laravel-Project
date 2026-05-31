<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
// use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return Inertia::render('Site/Home');
    }

    public function about(){
        return Inertia::render('Site/About');
    }

    public function session(){
        return Inertia::render('Site/Session');
    }

    public function service(){
        return Inertia::render('Site/Service');
    }

    public function team(){
        return Inertia::render('Site/Team');
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