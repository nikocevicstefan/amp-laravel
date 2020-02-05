<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = [];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
