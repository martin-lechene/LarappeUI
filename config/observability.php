<?php

declare(strict_types=1);

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return [

    /*
    |--------------------------------------------------------------------------
    | Identité du service
    |--------------------------------------------------------------------------
    |
    | Ces valeurs sont propagées à Sentry (tags) et à PostHog (super
    | propriétés) pour distinguer les projets dans les tableaux de bord.
    |
    */

    'service' => env('OBSERVABILITY_SERVICE', env('APP_NAME', 'laravel')),

    'environment' => env('OBSERVABILITY_ENV', env('APP_ENV', 'production')),

    'release' => env('OBSERVABILITY_RELEASE', env('APP_VERSION')),

    /*
    |--------------------------------------------------------------------------
    | Sentry
    |--------------------------------------------------------------------------
    |
    | Le package configure sentry/sentry-laravel. Laisser le DSN vide désactive
    | complètement Sentry : aucune requête réseau n'est émise, ce qui rend les
    | environnements locaux et la CI silencieux par défaut.
    |
    */

    'sentry' => [
        'enabled' => env('SENTRY_ENABLED', true),
        'dsn' => env('SENTRY_LARAVEL_DSN', env('SENTRY_DSN')),
        'traces_sample_rate' => (float) env('SENTRY_TRACES_SAMPLE_RATE', 0.2),
        'profiles_sample_rate' => (float) env('SENTRY_PROFILES_SAMPLE_RATE', 0.0),
        'send_default_pii' => (bool) env('SENTRY_SEND_DEFAULT_PII', false),

        // Attache l'utilisateur authentifié à chaque événement.
        'attach_user' => (bool) env('SENTRY_ATTACH_USER', true),

        // Exceptions jamais remontées, en plus de celles ignorées par Laravel.
        'ignore_exceptions' => [
            AuthenticationException::class,
            AuthorizationException::class,
            ModelNotFoundException::class,
            TokenMismatchException::class,
            ValidationException::class,
            NotFoundHttpException::class,
            MethodNotAllowedHttpException::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | PostHog
    |--------------------------------------------------------------------------
    |
    | Analytique produit. Le suivi côté serveur est privilégié : il survit aux
    | bloqueurs de publicité et ne dépend pas du JavaScript client.
    |
    */

    'posthog' => [
        'enabled' => env('POSTHOG_ENABLED', true),
        'api_key' => env('POSTHOG_API_KEY', env('POSTHOG_KEY')),
        'host' => env('POSTHOG_HOST', 'https://eu.i.posthog.com'),

        // Envoi asynchrone : les événements partent via la file si elle existe.
        'queue' => env('POSTHOG_QUEUE', true),
        'queue_connection' => env('POSTHOG_QUEUE_CONNECTION'),

        // Capture automatique des pages vues côté serveur.
        'autocapture_pageviews' => (bool) env('POSTHOG_AUTOCAPTURE', false),

        // Routes exclues de la capture automatique (motifs Str::is).
        'excluded_paths' => [
            'horizon/*',
            'telescope/*',
            'nova-api/*',
            '_debugbar/*',
            'livewire/*',
            'up',
            'health',
            'metrics',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resend
    |--------------------------------------------------------------------------
    |
    | Transport e-mail transactionnel. Le package se contente de valider la
    | configuration : le transport lui-même vient de resend/resend-laravel.
    |
    */

    'resend' => [
        'enabled' => env('MAIL_MAILER') === 'resend',
        'api_key' => env('RESEND_API_KEY', env('RESEND_KEY')),
        'from_address' => env('MAIL_FROM_ADDRESS'),
        'from_name' => env('MAIL_FROM_NAME', env('APP_NAME')),
    ],

];
