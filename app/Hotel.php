<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = ['id'];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function roomTypes(){
        return $this->hasMany(RoomType::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
