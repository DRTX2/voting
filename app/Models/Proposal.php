<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = ['candidate_id', 'title', 'description', 'category'];

    public function candidato()
    {
        return $this->belongsTo(Candidate::class);
    }
}
