<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=["id","name","location","description", "time"];
    
    public function faculties(){
        return $this->belongsToMany(Faculty::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
