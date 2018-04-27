<?php

namespace App\Api\Controllers;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request, JWTAuth $JWTAuth)
    {

        $credentials = $request->only(['email', 'password']);

        $valid = Validator::make($request->all(),[
                'email'=>'email',
            ]);

        if($valid->fails()){
            $credentials = array();
            $credentials['name'] = $request->email;
            $credentials['password'] = $request->password;
        }

        try {
            $token = $JWTAuth->attempt($credentials);

            if(!$token) {               
               // throw new AccessDeniedHttpException();
               return response()
                        ->json([
                            'message'=>'Your Account is Invalid!',
                            'status' => 'failed',
                            'token' => null,
                            'user' => []
                        ]);
            }

        } catch (JWTException $e) {
            throw new HttpException(500);
        }

        return response()
            ->json([
                'message'=>'Login is successfully!',
                'status' => 'ok',
                'token' => $token,
                'user' => $JWTAuth->toUser($token)
            ]);
    }
}
