<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThemeController extends Controller
{
    /**
     * Changer le thème et le sauvegarder en session.
     */
    public function setTheme(Request $request): JsonResponse
    {
        $theme = $this->resolve($request->input('theme'));

        Session::put('theme', $theme);

        return response()->json([
            'success' => true,
            'theme' => $theme,
            'message' => 'Thème mis à jour avec succès',
            'validThemes' => $this->validThemes(),
        ]);
    }

    /**
     * Obtenir le thème actuel.
     */
    public function getTheme(): JsonResponse
    {
        return response()->json([
            'theme' => Session::get('theme', $this->defaultTheme()),
        ]);
    }

    /**
     * Normaliser un nom de thème vers une palette existante.
     *
     * Le catalogue vit dans config/themes.php. La version precedente extrayait
     * la liste par regex depuis public/css/themes.css : elle ratait les
     * selecteurs groupes, ce qui faisait rejeter a tort les six alias
     * `*-light`, et elle acceptait des themes sans definition cote client.
     */
    private function resolve(mixed $theme): string
    {
        if (! is_string($theme) || $theme === '') {
            return $this->defaultTheme();
        }

        /** @var array<string, string> $aliases */
        $aliases = config('themes.aliases', []);
        $theme = $aliases[$theme] ?? $theme;

        /** @var array<string, mixed> $palettes */
        $palettes = config('themes.palettes', []);

        return isset($palettes[$theme]) ? $theme : $this->defaultTheme();
    }

    /**
     * Tous les noms de thème acceptés : palettes et alias.
     *
     * @return list<string>
     */
    private function validThemes(): array
    {
        /** @var array<string, mixed> $palettes */
        $palettes = config('themes.palettes', []);
        /** @var array<string, string> $aliases */
        $aliases = config('themes.aliases', []);

        return array_merge(array_keys($palettes), array_keys($aliases));
    }

    private function defaultTheme(): string
    {
        /** @var string $default */
        $default = config('themes.default', 'light');

        return $default;
    }
}
