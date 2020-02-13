<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{
    public function index(){
        $hotels = Hotel::all();
        return response()->json($hotels, 200);
    }

    public function show(Hotel $hotel){
        return response()->json($hotel, 200);
    }

    public function store(Request $request){
        return DB::transaction(function() use($request){
            $hotel = new Hotel($request->all());
            $hotel->save();

            foreach($request->file('pictures') as $picture){
                $hotel->addMedia($picture)->toMediaCollection();
            }
            return response()->json($hotel->load('media'), 201);
        });
    }

    public function update(Hotel $hotel, Request $request){
        return DB::transaction(function() use($hotel, $request){
            $hotel->update($request->all());
            foreach($request->file('pictures', []) as $picture){
                $hotel->addMedia($picture)->toMediaCollection();
            }
            return response($hotel->load('media'));
        });
    }

    public function destroy(Hotel $hotel){
        $hotel->delete();
        return response()->noContent();
    }
}
