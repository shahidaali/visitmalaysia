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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/{slug}', 'HomeController@page')->name('page');
Route::get('/articles/{slug}', 'ArticlesController@show')->name('article');

// FLIGHTS
Route::group(['prefix' => 'flights'], function () {
	Route::get('/search', 'FlightsController@search')
		->name('flights.search');
	Route::get('/search_flights', 'FlightsController@searchFlights')
		->name('flights.search_flights');
	Route::get('/search_places', 'FlightsController@searchPlaces')
		->name('flights.places.search');
});