<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use Illuminate\Http\Request;

class SearchHotelsController extends Controller
{
    public function search(Request $request){

        $hotels = Hotel::where('country_id', $request->country_id)
                        ->where('city', $request->city)
                        ->leftJoin('room_types', 'room_types.hotel_id', '=', 'hotels.id' )
                        ->where('number_of_beds', '>=', $request->get('min_beds', 0))
                        ->where('number_of_rooms', '>=', $request->get('min_rooms', 0))
                        ->where('number_of_bathrooms', '>=', $request->get('min_bathrooms', 0))
                        ->where('max_capacity', '>=', $request->get('min_guests', 0))
                        ->withCount('rooms as available_rooms_count')->paginate($request->get('per_page', 2));
        return HotelResource::collection($hotels->appends($_GET));
    }

}
