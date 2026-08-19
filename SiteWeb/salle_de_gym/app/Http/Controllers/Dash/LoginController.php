<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
// use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return Inertia::render('Dashboard/Login');
    }
}
