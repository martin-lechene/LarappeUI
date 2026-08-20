<?php

namespace App\Http\Controllers;

use App\Support\ThemeRegistry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThemeController extends Controller
{
    /**
     * Changer le thème et le sauvegarder en session
     */
    public function setTheme(Request $request): JsonResponse
    {
        $validThemes = ThemeRegistry::available();

        $theme = ThemeRegistry::sanitize($request->string('theme')->toString());

        Session::put('theme', $theme);

        return response()->json([
            'success' => true,
            'theme' => $theme,
            'message' => 'Thème mis à jour avec succès',
            'validThemes' => $validThemes,
        ]);
    }

    /**
     * Obtenir le thème actuel
     */
    public function getTheme(): JsonResponse
    {
        return response()->json([
            'theme' => Session::get('theme', ThemeRegistry::default()),
        ]);
    }
}
