<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchRoomsController extends Controller
{
    public function search(Request $request, Hotel $hotel){
        $query = RoomType::query()->where('hotel_id', $hotel->id)->withCount('rooms as available_rooms_count');

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


        $results = $query->get();
        return response()->json($results);
    }
}
