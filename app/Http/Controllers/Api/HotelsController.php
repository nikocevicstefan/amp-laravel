<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{
    public function index(){
        $hotels = Hotel::all();
        return HotelResource::collection($hotels);
    }

    public function show(Hotel $hotel){
        return new HotelResource($hotel);
    }

    public function store(Request $request){
        return DB::transaction(function() use($request){
            $hotel = new Hotel($request->all());
            $hotel->save();

            if($request->hasFile('pictures')){
                foreach($request->file('pictures') as $picture){
                    $hotel->addMedia($picture)->toMediaCollection();
                }
            }

            return new HotelResource($hotel);
        });
    }

    public function update(Hotel $hotel, Request $request){
        return DB::transaction(function() use($hotel, $request){
            $hotel->update($request->all());
            if($request->hasFile('pictures')){
                foreach($request->file('pictures') as $picture){
                    $hotel->addMedia($picture)->toMediaCollection();
                }
            }
            return new HotelResource($hotel);
        });
    }

    public function destroy(Hotel $hotel){
        $hotel->delete();
        return response()->noContent();
    }
}
