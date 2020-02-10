<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $guarded = [];

    public function hotel(){
        $this->belongsTo(Hotel::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
