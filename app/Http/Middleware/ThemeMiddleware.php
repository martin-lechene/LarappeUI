<?php

namespace App\Http\Middleware;

use App\Support\ThemeRegistry;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si aucun thème n'est défini en session, utiliser le thème par défaut
        if (! Session::has('theme')) {
            Session::put('theme', ThemeRegistry::default());
        }

        // Partager le thème avec toutes les vues
        view()->share('currentTheme', ThemeRegistry::sanitize(Session::get('theme')));

        return $next($request);
    }
}
