<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['candidate_id'];
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
