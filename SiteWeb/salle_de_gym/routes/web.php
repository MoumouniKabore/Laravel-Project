<?php

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

Route::fallback(function () {
    return Inertia::render('Site/Errors/404');
});