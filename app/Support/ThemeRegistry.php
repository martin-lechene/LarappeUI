<?php

namespace App\Support;

/**
 * Point d'accès unique à la liste des thèmes disponibles.
 */
class ThemeRegistry
{
    public const DEFAULT_THEME = 'light';

    /**
     * Liste des thèmes utilisables par l'application.
     *
     * @return list<string>
     */
    public static function available(): array
    {
        $themes = config('themes.available', []);

        if (! is_array($themes) || $themes === []) {
            return [self::DEFAULT_THEME];
        }

        return array_values(array_map(strval(...), $themes));
    }

    /**
     * Thème par défaut configuré.
     */
    public static function default(): string
    {
        /** @var string $default */
        $default = config('themes.default', self::DEFAULT_THEME);

        return $default;
    }

    /**
     * Retourne le thème demandé s'il est valide, le thème par défaut sinon.
     */
    public static function sanitize(?string $theme): string
    {
        return in_array($theme, self::available(), true)
            ? (string) $theme
            : self::default();
    }
}
