<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestAccessTokenController extends Controller
{

    public function getToken(Request $request){
        $credentials = $request->only(['email', 'password']);

        $token = auth('api')->attempt($credentials);

        if(!$token){
           abort(401, 'invalid credentials');
        }

        return([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL()
            ]);
    }

}
