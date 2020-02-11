<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchRoomsController extends Controller
{
    public function search(Request $request, Hotel $hotel){
        $query = Room::query()->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
            ->where('rooms.hotel_id', '=', $hotel->id);

        if($request->has('min_beds')){
            $query->where('number_of_beds','>=', $request->min_beds);
        }
        if($request->has('min_rooms')){
            $query->where('number_of_rooms','>=', $request->min_rooms);
        }

        if($request->has('min_bathrooms')){
            $query->where('number_of_bathrooms','>=', $request->min_bathrooms);
        }

        if($request->has('min_guests')){
            $query->where('max_capacity','>=', $request->min_guests);
        }

        /*To be implemented with reservation system
        if($request->has('check_in') && $request->has('check_out')){}*/

        //returns routes to available rooms
        $roomsAvailable = $query->pluck('rooms.id')->toArray();
        return response()->json(
            [
                'total' => sizeof($roomsAvailable),
                'available_rooms' =>
                array_map(function($id) use ($hotel){
                    return "/api/hotels/{$hotel->id}/rooms/{$id}";
                }, $roomsAvailable),
            ]);
    }
}
