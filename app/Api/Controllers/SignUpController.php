<?php

namespace App\Api\Controllers;

use Config;
use App\User;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\Requests\SignUpRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;
use Helpers;
use Validator;

class SignUpController extends Controller
{
    public function signUp(Request $request, JWTAuth $JWTAuth)
    {     
        
        $valid = Validator::make($request->all(),[
                'name'=>'required|unique:users,name',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|same:confirm_password',
            ]);

        if($valid->fails()){
             return response()->json([
                'message' => Helpers::msgValidSingle($valid),
                'status' => 'failed',
                'token' => null,
                'user' => []
            ]);
        }

        $user = new User($request->all());
            if(!$user->save()) {
                return response()->json([
                'message' => 'Register is failed!',
                'status' => 'failed',
                'token' => null,
                'user' => []
            ]);
           // throw new HttpException(500);
        }

        // if(!Config::get('boilerplate.sign_up.release_token')) {
        //     return response()->json([
        //         'status' => 'ok'
        //     ], 201);
        // }

        $token = $JWTAuth->fromUser($user);
        return response()->json([
            'message' => 'Register is sucessfully!',
            'status' => 'ok',
            'token' => $token,
            'user' => $user
        ]);
    }
}
