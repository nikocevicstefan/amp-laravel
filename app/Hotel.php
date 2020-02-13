<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Hotel extends Model implements HasMedia
{
    use HasMediaTrait;
    public $with = ['country', 'media'];
    protected $guarded = ['id', 'pictures'];

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
