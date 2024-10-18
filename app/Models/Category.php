<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Relación: una categoría puede tener muchas sugerencias
    public function suggestions(){
        return $this->belongsToMany(Suggestion::class);
    }

    public function events(){
        return $this->belongsToMany(Event::class);
    }

    public function proposals(){
        return $this->belongsToMany(Proposal::class);
    }

    
    
}
