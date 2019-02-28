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

Route::get("/test", function(){
	
});

Route::get("/", "DefaultController@getIndex");
	
Route::any("/logout", "AuthController@anyLogout");
Route::group(["middleware" => "sentinel.guest"], function(){
	Route::get("/register", "AuthController@getRegister");
	Route::post("/register", "AuthController@postRegister");

	Route::get("/login", "AuthController@getLogin");
	Route::post("/login", "AuthController@postLogin");

	Route::get("/remind", "AuthController@getRemind");
	Route::post("/remind", "AuthController@postRemind");

	Route::get("/reset/{code}", "AuthController@getReset");
	Route::post("/reset/{code}", "AuthController@postReset");
});