<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Pages principales avec middleware de thème
Route::middleware(['theme'])->group(function () {
    Route::get('/', function () {
        return view('components');
    })->name('home');

    Route::get('/components', function () {
        return view('components');
    })->name('components');

    Route::get('/examples', function () {
        return view('examples');
    })->name('examples');
});

// Endpoints API pour le système de thème
Route::post('/theme/set', [ThemeController::class, 'setTheme'])->name('theme.set');
Route::get('/theme/get', [ThemeController::class, 'getTheme'])->name('theme.get');

// Endpoints nécessaires aux démos fonctionnelles
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
