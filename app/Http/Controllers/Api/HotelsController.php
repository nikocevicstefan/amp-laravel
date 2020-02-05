<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index(){
        $hotels = Hotel::with('country')->get();
        return response()->json($hotels, 200);
    }

    public function show(Hotel $hotel){
        return response()->json($hotel->load('country'), 200);
    }

    public function store(Request $request){
        $hotel = new Hotel($request->all());
        $hotel->save();
        return response()->json($hotel, 201);
    }
    public function update(Hotel $hotel, Request $request){
        $hotel->fill($request->all());
        $hotel->save();
    }
    public function destroy(Hotel $hotel){
        $hotel->delete();
        return response()->noContent();
    }
}
