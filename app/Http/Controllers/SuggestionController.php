<?php

namespace App\Http\Controllers;

use App\Mail\SugerenciaMail;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SuggestionController extends Controller
{
    public function create()
    {
        return view('suggestions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'campo1' => 'required',
            'campo2' => 'required',
        ]);

        Suggestion::create($validatedData);

        // Send email
        Mail::to('admin@example.com')->send(new SugerenciaMail($request->all()));

        return redirect()->back()->with('success', 'Sugerencia enviada correctamente.');
    }
}
