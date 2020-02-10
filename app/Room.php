<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function roomType(){
        return $this->belongsTo(RoomType::class);
    }
}
