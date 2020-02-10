<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\RoomType;
use Illuminate\Http\Request;

class RoomTypesController extends Controller
{

    public function index(Hotel $hotel)
    {
        $roomTypes = RoomType::where('hotel_id', $hotel->id)->get();
        return response()->json($roomTypes);
    }

    public function store(Hotel $hotel, Request $request)
    {
        $data = ['hotel_id'=>$hotel->id] + $request->all();
        $roomType = RoomType::create($data);

        return response()->json($roomType, 201);
    }

    //using Request instead of route model binding {hotel} and {room_type} because the Hotel would be unused
    public function show(Request $request)
    {
        $roomType = RoomType::find($request->route('room_type'));
        return response()->json($roomType, 200);
    }


    public function update(Request $request)
    {
        $roomType = RoomType::findOrFail($request->route('room_type'));

        $roomType->update($request->all());

        return response()->json($roomType);
    }


    public function destroy(Request $request)
    {
        $roomType = RoomType::findOrFail($request->route('room_type'));

        $roomType->delete();

        return response()->noContent();
    }
}
