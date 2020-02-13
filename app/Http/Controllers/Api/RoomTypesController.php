<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomTypesController extends Controller
{

    public function index(Hotel $hotel)
    {
        $roomTypes = RoomType::where('hotel_id', $hotel->id)->get();
        return response()->json($roomTypes);
    }

    public function store(Hotel $hotel, Request $request)
    {
        return DB::transaction(function() use($hotel, $request){
            $data = ['hotel_id'=>$hotel->id] + $request->all();
            $roomType = new RoomType($data);
            $roomType->save();

            foreach($request->file('pictures') as $picture){
                $roomType->addMedia($picture)->toMediaCollection('hotel');
            }

            return response()->json($roomType->load('media'), 201);
        });
    }

    //using Request instead of route model binding {hotel} and {room_type} because the Hotel would be unused
    public function show(Request $request)
    {
        $roomType = RoomType::find($request->route('room_type'));
        return response()->json($roomType, 200);
    }


    public function update(Request $request)
    {
        return DB::transaction(function()use ($request){
            $roomType = RoomType::findOrFail($request->route('room_type'));
            $roomType->update($request->all());

            foreach($request->file('pictures', []) as $picture){
                $roomType->addMedia($picture)->toMediaCollection();
            }
            return response()->json($roomType->load('media'));
        });
    }


    public function destroy(Request $request)
    {
        $roomType = RoomType::findOrFail($request->route('room_type'));

        $roomType->delete();

        return response()->noContent();
    }
}
