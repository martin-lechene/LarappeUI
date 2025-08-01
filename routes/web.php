<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes pour la documentation des composants et thèmes
require __DIR__.'/routes/components-docs.php';