<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class ThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response|RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Si aucun thème n'est défini en session, utiliser le thème par défaut
        if (! Session::has('theme')) {
            Session::put('theme', 'light');
        }

        // Partager le thème avec toutes les vues
        view()->share('currentTheme', Session::get('theme', 'light'));

        return $next($request);
    }
}
