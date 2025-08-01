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
        $validThemes = [
            'light', 'dark', 'pro', 'enterprise', 'glass', 'neon', 
            'forest', 'sea', 'sunset', 'modern', 'minimal', '2d', 
            'retro', 'cyberpunk', 'pastel'
        ];
        
        if (!in_array($theme, $validThemes)) {
            $theme = 'light';
        }
        
        // Sauvegarder en session
        Session::put('theme', $theme);
        
        return response()->json([
            'success' => true,
            'theme' => $theme,
            'message' => 'Thème mis à jour avec succès'
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