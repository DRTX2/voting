<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('candidates', CandidateController::class)->only(['index', 'show']);
Route::get('proposals', [ProposalController::class, 'index'])->name('proposals.index');
Route::get('sugerencias/create', [SuggestionController::class, 'create'])->name('sugerencias.create');
Route::post('sugerencias', [SuggestionController::class, 'store'])->name('sugerencias.store');
Route::post('votar/{candidato}', [VoteController::class, 'votar'])->name('votar');
