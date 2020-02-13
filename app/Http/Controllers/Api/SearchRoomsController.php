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
    public function search(Request $request, Hotel $hotel)
    {
        $query = RoomType::where('hotel_id', $hotel->id)
                ->where('number_of_beds', '>=', $request->get('min_beds', 0))
                ->where('number_of_rooms', '>=', $request->get('min_rooms', 0))
                ->where('number_of_bathrooms', '>=', $request->get('min_bathrooms', 0))
                ->where('max_capacity', '>=', $request->get('min_guests', 0))
                ->withCount('rooms as available_rooms_count')
                ->orderBy('max_capacity');

        /*To be implemented with reservation system
        if($request->has('check_in') && $request->has('check_out')){}*/

        $results = $query->get();
        return response()->json($results->load('media'));
    }
}
