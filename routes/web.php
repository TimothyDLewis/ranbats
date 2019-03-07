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

Route::group(["prefix" => "games"], function(){
	Route::get("/", "GameController@getGames");

	Route::get("/{slug}", "GameController@getDetail");
});

Route::group(["prefix" => "series"], function(){
	Route::get("/", "SeriesController@getSeries");

	Route::group(["middleware" => ["sentinel.auth", "sentinel.roles.admin"]], function(){
		Route::get("/create", "SeriesController@getCreate");
	});

	Route::group(["prefix" => "{seriesSlug}"],function(){
		Route::get("/","SeriesController@getDetail");

		Route::group(["prefix" => "{tournamentSlug}"], function(){
			Route::get("/", "TournamentController@getDetail");
		});
	});
});

Route::group(["middleware" => "sentinel.auth"], function(){
	Route::get("/profile", "AccountController@getProfile");
	Route::post("/profile", "AccountController@postProfile");
});