<?php
use App\Http\Requests;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', 'ProductController');
// Project CRUD
Route::get('projects', 'ProjectController@index');
Route::get('projects/{project}', 'ProjectController@show');
Route::post('projects','ProjectController@store');
Route::post('projects/{project}','ProjectController@update');
Route::delete('projects/{project}', 'ProjectController@destroy');
Route::get('projects/detail/{project}', 'ProjectController@show');
Route::delete('project/detach/{member_role}', 'ProjectController@detach');

// Member CRUD
Route::get('members', 'MemberController@index');
Route::get('members/{member}', 'MemberController@show');
Route::post('members','MemberController@store');
Route::post('members/{member}','MemberController@update');
Route::delete('members/{member}', 'MemberController@destroy');
// assign to project
Route::post('project/assign', 'ProjectController@assignMember');

// Member CRUD
Route::get('clients', 'ClientController@index');
Route::get('clients/{clients}', 'ClientController@show');
Route::post('clients','ClientController@store');
Route::post('clients/{clients}','ClientController@update');
Route::put('clients/{clients}','ClientController@update');
Route::delete('clients/{clients}', 'ClientController@destroy');

  //app
  Route::resource('articles','\App\\Api\\ArticleController');

  Route::group(['prefix' => 'auth', 'middleware' => 'cors'], function() {

    Route::post('signup', '\App\\Api\\Controllers\\SignUpController@signUp');
    Route::post('login', '\App\\Api\\Controllers\\LoginController@login');
    Route::post('recovery', '\App\\Api\\Controllers\\ForgotPasswordController@sendResetEmail');
    Route::post('reset', '\App\\Api\\Controllers\\ResetPasswordController@resetPassword');
  });

  Route::group(['middleware' => 'jwt.auth'], function() {
    Route::get('protected', function() {
      return response()->json([
                  'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
      ]);
    });

    Route::resource('books', '\App\Api\Controllers\BookController');

  });

  Route::get('refresh', function(Request $Request) {
    $input=$Request->all();
        $token = $input['Token'];

   if(!$token){
    $Err['status']='error';
    $Err['msg']='There is no token';
    return response()
    ->json($Err, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);
    }

    try{
        $token = JWTAuth::refresh($token);

  }catch (JWTException $e) {
    $ERR['status']='error';
    $ERR['MSG']= "the was erorr on you token ";
    return response()
    ->json($ERR, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);

            }

     $Sucss['status']='success';
     $Sucss['token']= $token;
     return response()
    ->json($Sucss, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);

      });

  Route::get('hello', function() {
    return response()->json([
                'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
    ]);
});


