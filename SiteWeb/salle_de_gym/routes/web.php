<?php

use App\Http\Controllers\Dash\AppointmentController;
use App\Http\Controllers\Dash\DashViewController;
use App\Http\Controllers\Dash\LoginController;
use App\Http\Controllers\Dash\TeamController;
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
    
    Route::post('appointments', [AppointmentController::class, 'store_appointment'])->name('store.appointment');
    Route::get('appointments', [AppointmentController::class, 'all_appointment'])->name('all.appointment');
    Route::get('appointments/{appointment}', [AppointmentController::class, 'show_appointment'])->name('show.appointment');
    Route::delete('appointments/{appointment}', [AppointmentController::class, 'delete_appointment'])->name('delete.appointment');
    Route::patch('appointments/{appointment}', [AppointmentController::class, 'change_statut'])->name('change.statut.appointment');

    Route::resource('teams', TeamController::class);


Route::fallback(function () {
    return Inertia::render('Site/Errors/404');
});