<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function () {	

Route::get('/','Site\SiteController@index');
Route::get('/contact','Site\SiteController@contact');
Route::get('/service','Site\SiteController@service');
Route::get('/web-develop','Site\SiteController@web_develop');
Route::get('/web-design','Site\SiteController@web_design');
Route::get('/web-hosting','Site\SiteController@web_hosting');
Route::get('/seo','Site\SiteController@seo');
Route::get('/domain-register','Site\SiteController@domain_register');
Route::get('/about','Site\SiteController@about');
Route::get('/technology','Site\SiteController@technology');

});


Route::group(['prefix'=>'admin-bsite'],function(){
	Route::get('/', function () {
      return view('welcome');
	});

	Route::get('/clients', 'ClientController@clients');
	Route::get('/clients/new', 'ClientController@newClient');
	Route::get('/clients/edit/{id}', 'ClientController@editClient');

	Route::get('/members', 'MemberController@members');
	Route::get('/members/new', 'MemberController@members');
	Route::get('/members/edit/{id}', 'MemberController@members');

	Route::get('/projects', 'ProjectController@projects');
	Route::get('/projects/new', 'ProjectController@projects');
	Route::get('/projects/edit/{id}', 'ProjectController@projects');
	Route::get('/projects/assign', 'ProjectController@projects');
	Route::get('/projects/detail/{id}', 'ProjectController@projects');

});
