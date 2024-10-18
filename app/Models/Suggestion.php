<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = ['guest_id', 'message', 'date', 'time', 'categories'];

    public function guest(){
        return $this->belongsTo(Guest::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
}
