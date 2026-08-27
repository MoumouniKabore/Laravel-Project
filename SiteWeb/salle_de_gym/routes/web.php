<?php

use App\Http\Controllers\Dash\DashViewController;
use App\Http\Controllers\Dash\LoginController;
use App\Http\Controllers\Dash\TestimonieController;
use App\Http\Controllers\Pages\MessageController;
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

    Route::post('messages', [MessageController::class, 'store_message'])->name('store.message');
    Route::get('messages', [MessageController::class, 'all_message'])->name('all.message');
    Route::get('messages/{message}', [MessageController::class, 'show_message'])->name('show.message');
    Route::delete('messages/{message}', [MessageController::class, 'delete_message'])->name('delete.message');
    Route::patch('messages/{message}', [MessageController::class, 'change_statut'])->name('change.statut.message');

    Route::post('testimonies', [TestimonieController::class, 'store_testimonie'])->name('store.testimonie');
    Route::get('testimonies', [TestimonieController::class, 'all_testimonie'])->name('all.testimonie');
    Route::get('testimonies/{testimonie}', [TestimonieController::class, 'show_testimonie'])->name('show.testimonie');
    Route::delete('testimonies/{testimonie}', [TestimonieController::class, 'delete_testimonie'])->name('delete.testimonie');
    Route::patch('testimonies/{testimonie}', [TestimonieController::class, 'change_statut'])->name('change.statut.testimonie');
    Route::put('testimonies/{testimonie}', [TestimonieController::class, 'change_publish'])->name('change.publish.testimonie');

Route::get('teams/add', [DashViewController::class, 'teams_add'])->name('teams-add');
Route::get('teams/all', [DashViewController::class, 'teams_all'])->name('teams-all');
Route::get('teams/edit', [DashViewController::class, 'teams_edit'])->name('teams-edit');
Route::get('teams/view', [DashViewController::class, 'teams_view'])->name('teams-view');


Route::fallback(function () {
    return Inertia::render('Site/Errors/404');
});