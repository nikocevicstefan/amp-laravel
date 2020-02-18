<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index(Hotel $hotel){
        $rooms = Room::where('hotel_id', $hotel->id)->get();
        return response()->json($rooms);
    }

    public function store(Request $request, Hotel $hotel){
        $data = ['hotel_id' => $hotel->id] + $request->all();
        $room = Room::create($data);

        return response()->json($room, 201);
    }

    //using Request instead of route model binding {hotel} and {room} because the Hotel would be unused
    public function show(Request $request){
        $room = Room::findOrFail($request->route('room'))->load('roomType');

        return response()->json($room);
    }

    public function update(Request $request){
        $room = Room::findOrFail($request->route('room'));
        $room->update($request->all());
        return response()->json($room->load('roomType'), 200);
    }

    public function destroy(Request $request){
        $room = Room::findOrFail($request->route('room'));
        $room->delete();
        return response()->noContent();
    }
}
