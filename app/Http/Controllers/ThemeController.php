<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThemeController extends Controller
{
    /**
     * Changer le thème et le sauvegarder en session
     */
    public function setTheme(Request $request)
    {
        $theme = $request->input('theme', 'light');

        // Valider le thème
        // Récupérer dynamiquement les thèmes disponibles depuis le fichier CSS compilé
        $themeCssPath = public_path('css/themes.css');
        $validThemes = [];

        if (file_exists($themeCssPath)) {
            $cssContent = file_get_contents($themeCssPath);
            // Cherche les classes .theme-xxxx { ... }
            preg_match_all('/\.theme-([a-zA-Z0-9_-]+)\s*\{/', $cssContent, $matches);
            if (!empty($matches[1])) {
                $validThemes = $matches[1];
            }
        }

        // Fallback si aucun thème trouvé
        if (empty($validThemes)) {
            $validThemes = ['light'];
        }

        if (!in_array($theme, $validThemes)) {
            $theme = 'light';
        }

        // Sauvegarder en session
        Session::put('theme', $theme);

        return response()->json([
            'success' => true,
            'theme' => $theme,
            'message' => 'Thème mis à jour avec succès',
            'validThemes' => $validThemes
        ]);
    }

    /**
     * Obtenir le thème actuel
     */
    public function getTheme()
    {
        $theme = Session::get('theme', 'light');

        return response()->json([
            'theme' => $theme
        ]);
    }
}
