<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name', 'position', 'experience', 'education', 'description'];

    public function proposals(){
        return $this->hasMany(Proposal::class);
    }

    public function faculties(){
        return $this->belongsTo(Faculty::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class);
    }

}
