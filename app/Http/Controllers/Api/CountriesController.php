<?php

namespace App\Http\Controllers\Api;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{

    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function store(Request $request)
    {
        $country = Country::create($request->all());

        return response()->json($country, 201);
    }


    public function show(Country $country)
    {
        return response()->json($country);
    }


    public function update(Request $request, Country $country)
    {
        $country->fill($request->all());
        $country->save();
        return response()->json($country);
    }


    public function destroy(Country $country)
    {
        $country->delete();
        return response()->noContent(204);
    }
}
