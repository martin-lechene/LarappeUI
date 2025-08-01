<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Si aucun thème n'est défini en session, utiliser le thème par défaut
        if (!Session::has('theme')) {
            Session::put('theme', 'light');
        }
        
        // Partager le thème avec toutes les vues
        view()->share('currentTheme', Session::get('theme', 'light'));
        
        return $next($request);
    }
} 