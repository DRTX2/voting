<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request, $candidate_id)
    {
        // Verifica si ya votó en la sesión
        if (session()->has('voto')) {
            return redirect()->back()->with('error', 'Solo puedes votar una vez por sesión.');
        }

        // Registra el voto
        Vote::create([
            'candidate_id' => $candidate_id,
            'sesion_id' => session()->getId()
        ]);

        // Marca la sesión como votada
        session(['vote' => true]);

        return redirect()->back()->with('success', 'Tu voto ha sido registrado.');
    }
}
