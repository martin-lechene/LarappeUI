<?php

use Illuminate\Support\Facades\Route;

// Route principale de documentation
Route::get('/components-docs', function () {
    return view('components-docs');
})->name('components-docs');

// Route pour la documentation des composants individuels
Route::get('/components-docs/{component}', function ($component) {
    $view = "components-docs-{$component}";
    
    if (!view()->exists($view)) {
        abort(404);
    }
    
    return view($view);
})->name('components-docs.component');

// Route pour le gestionnaire de thèmes
Route::get('/themes-manager', function () {
    return view('themes-manager');
})->name('themes-manager');

// Route pour la showcase des thèmes
Route::get('/themes-showcase', function () {
    return view('themes-showcase');
})->name('themes-showcase');

// Route pour la page de test
Route::get('/test-system', function () {
    return view('test-system');
})->name('test-system');

// Route pour la page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');