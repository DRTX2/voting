<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidates.index', compact('candidates'));
    }

    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('candidates.show', compact('candidate'));
    }
}
