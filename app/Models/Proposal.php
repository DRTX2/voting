<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = ['candidate_id', 'title', 'description', 'categories'];

    public function candidato()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function suggestions(){
        return $this->hasMany(Suggestion::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
