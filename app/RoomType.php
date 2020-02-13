<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class RoomType extends Model implements HasMedia
{
    use HasMediaTrait;
    public $with = ['media'];
    protected $guarded = ['id', 'pictures'];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }

}
