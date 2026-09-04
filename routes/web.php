<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ThemeController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

RateLimiter::for('contact', fn (Request $request) => Limit::perMinute(5));

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

// Endpoints API pour le système de thème.
// Le middleware 'theme' garantit qu'une valeur est presente en session avant
// que le controleur ne la lise ou ne l'ecrive.
Route::middleware(['theme'])->group(function () {
    Route::post('/theme/set', [ThemeController::class, 'setTheme'])->name('theme.set');
    Route::get('/theme/get', [ThemeController::class, 'getTheme'])->name('theme.get');
});

// Endpoints nécessaires aux démos fonctionnelles
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:contact')
    ->name('contact.store');
