<?php

use App\Http\Controllers\Dash\DashViewController;
use App\Http\Controllers\Dash\LoginController;
use App\Http\Controllers\Pages\PagesController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('about', [PagesController::class, 'about'])->name('about');
Route::get('session', [PagesController::class, 'session'])->name('session');
Route::get('service', [PagesController::class, 'service'])->name('service');
Route::get('team', [PagesController::class, 'team'])->name('team');
Route::get('gallery', [PagesController::class, 'gallery'])->name('gallery');
Route::get('bmi', [PagesController::class, 'bmi'])->name('bmi');
Route::get('contact', [PagesController::class, 'contact'])->name('contact');

Route::get('login', [LoginController::class, 'login'])->name('login');

Route::get('dashboard/home', [DashViewController::class, 'dashboard_home'])->name('dashboard-home');

Route::get('appointments/all', [DashViewController::class, 'appointments_all'])->name('appointments-all');
Route::get('appointments/view', [DashViewController::class, 'appointments_view'])->name('appointments-view');

Route::get('messages/all', [DashViewController::class, 'messages_all'])->name('messages-all');
Route::get('messages/view', [DashViewController::class, 'messages_view'])->name('messages-view');

Route::get('teams/add', [DashViewController::class, 'teams_add'])->name('teams-add');
Route::get('teams/all', [DashViewController::class, 'teams_all'])->name('teams-all');
Route::get('teams/edit', [DashViewController::class, 'teams_edit'])->name('teams-edit');
Route::get('teams/view', [DashViewController::class, 'teams_view'])->name('teams-view');

Route::get('testimonies/all', [DashViewController::class, 'testimonies_all'])->name('testimonies-all');
Route::get('testimonies/view', [DashViewController::class, 'testimonies_view'])->name('testimonies-view');


Route::fallback(function () {
    return Inertia::render('Site/Errors/404');
});