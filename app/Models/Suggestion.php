<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = ["name",'description', 'time', 'categories', 'guest_id'];

    public function guest(){
        return $this->belongsTo(Guest::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function proposal(){
        return $this->belongsTo(Proposal::class);
    }

}
