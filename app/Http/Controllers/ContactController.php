<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        // Pour la démo: on log l'entrée. Dans un vrai projet on pourrait envoyer un mail, créer un ticket, etc.
        Log::info('Contact message received', $validated);

        return response()->json([
            'success' => true,
            'message' => 'Merci, votre message a bien été envoyé.'
        ]);
    }
}