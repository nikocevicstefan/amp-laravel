<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [''];

    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
}
