<?php

namespace App\Http\Controllers\Api;

use App\Country;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{

    public function index()
    {
        $countries = Country::all();
        return CountryResource::collection($countries);
    }

    public function store(Request $request)
    {
        $country = Country::create($request->all());

        return new CountryResource($country);
    }


    public function show(Country $country)
    {
        return new CountryResource($country);
    }


    public function update(Request $request, Country $country)
    {
        $country->fill($request->all());
        $country->save();
        return new CountryResource($country);
    }


    public function destroy(Country $country)
    {
        $country->delete();
        return response()->noContent(204);
    }
}
