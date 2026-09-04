<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        // Le nonce doit exister avant le rendu de la vue : Vite l'appose sur
        // ses propres balises, et le layout le reprend pour les scripts inline.
        $nonce = Str::random(24);
        Vite::useCspNonce($nonce);
        $request->attributes->set('csp_nonce', $nonce);

        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
        $response->headers->set('Content-Security-Policy', $this->contentSecurityPolicy($nonce));

        return $response;
    }

    /**
     * Politique de securite du contenu.
     *
     * `unsafe-eval` est indispensable : Alpine compile ses expressions avec le
     * constructeur Function. Les scripts inline passent en revanche par un
     * nonce plutot que par `unsafe-inline`, qui aurait autorise n'importe quel
     * script injecte dans la page.
     */
    private function contentSecurityPolicy(string $nonce): string
    {
        $directives = [
            "default-src 'self'",
            // cdnjs : Prism et son autoloader, qui injecte les grammaires a la demande.
            "script-src 'self' 'nonce-{$nonce}' 'unsafe-eval' https://cdnjs.cloudflare.com",
            // Les styles restent en unsafe-inline : Alpine (x-show, :style) et
            // themes-manager ecrivent des styles inline sur les elements.
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdnjs.cloudflare.com",
            'font-src \'self\' data: https://fonts.gstatic.com',
            // picsum.photos alimente les demos gallery et media.
            "img-src 'self' data: blob: https://picsum.photos https://fastly.picsum.photos",
            "connect-src 'self' https://cdnjs.cloudflare.com",
            "frame-ancestors 'none'",
            "base-uri 'self'",
            "form-action 'self'",
            "object-src 'none'",
        ];

        return implode('; ', $directives);
    }
}
