<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = ['username', 'email', 'message', 'date', 'time', 'vote'];
}
