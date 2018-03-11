<?php

namespace App\Api\Controllers;

use Config;
use App\User;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\Requests\SignUpRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function signUp(Request $request, JWTAuth $JWTAuth)
    {
      
        $user = new User($request->all());
        if(!$user->save()) {
            throw new HttpException(500);
        }

        // if(!Config::get('boilerplate.sign_up.release_token')) {
        //     return response()->json([
        //         'status' => 'ok'
        //     ], 201);
        // }

        $token = $JWTAuth->fromUser($user);
        return response()->json([
            'status' => 'ok',
            'token' => $token,
            'user' => $user
        ], 201);
    }
}
