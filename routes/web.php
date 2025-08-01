<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Appliquer le middleware de thèmes à toutes les routes
Route::middleware(['theme'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/components-docs', function () {
        return view('components-docs');
    })->name('components-docs');

    Route::get('/components-docs/{component}', function ($component) {
        return view('components-docs', compact('component'));
    })->name('components-docs.show');

    Route::get('/themes-manager', function () {
        return view('themes-manager');
    })->name('themes-manager');

    Route::get('/themes-showcase', function () {
        return view('themes-showcase');
    })->name('themes-showcase');

    Route::get('/test-themes', function () {
        return view('test-themes');
    })->name('test-themes');
});

// Routes pour la gestion des thèmes
Route::post('/theme/set', [ThemeController::class, 'setTheme'])->name('theme.set');
Route::get('/theme/get', [ThemeController::class, 'getTheme'])->name('theme.get');
