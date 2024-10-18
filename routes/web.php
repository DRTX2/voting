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

Route::get('suggestions/create', [SuggestionController::class, 'create'])->name('suggestions.create');
Route::post('suggestions', [SuggestionController::class, 'store'])->name('suggestions.store');

// Route::get('events-and-notices', [::class, 'index'])->name('events.notices');

Route::post('vote/{candidate}', [VoteController::class, 'votar'])->name('vote');
