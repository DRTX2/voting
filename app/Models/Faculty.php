<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable=["name","location"];
    // Relación One-to-Many: Un usuario tiene muchos posts
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function events(){
        return $this->belongsToMany(Category::class);
    }
    
}
