<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Input;
class authJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['response'=>['message'=>'Token is Invalid','status'=>401]]);
            }else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['response'=>['message'=>'Token is Expired','status'=>401]]);
            }else{
                return response()->json(['response'=>['message'=>'Something is wrong','status'=>401]]);
            }
        }
            
        return $next($request);
    }
}
