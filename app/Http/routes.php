<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => ['web']], function () {

	Route::group(['prefix' => 'api/v1'],function(){
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Content-Type");
		Route::get('/','ApiController@index');
		Route::get('users/{id}/videos','VideoController@index');
		Route::resource('videos','VideoController');
		Route::resource('analyses','AnalyseController');
		Route::resource('groups','GroupController');
		Route::resource('sports','SportController');
		Route::resource('users','UserController',['only' => ['index','show','store']]);

	});


});
