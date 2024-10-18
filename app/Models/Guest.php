<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['username', 'email'];

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }

    public function suggestions(){
        return $this->hasMany(Suggestion::class);
    }

}
