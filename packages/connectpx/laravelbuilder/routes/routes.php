<?php

use Illuminate\Support\Str;
use Illuminate\Routing\Router;
use Connectpx\LaravelBuilder\Facades\LaravelBuilder;

/*
|--------------------------------------------------------------------------
| Voyager Routes
|--------------------------------------------------------------------------
|
| This file is where you may override any of the routes that are included
| with Voyager.
|
*/

Route::group(['prefix' => 'laravelbuilder', 'as' => 'laravelbuilder.'], function () {
	$namespacePrefix = '\\'.config('laravelbuilder.controllers.namespace').'\\';

	Route::get('snippets', ['uses' => $namespacePrefix.'LaravelBuilderController@snippets',     'as' => 'snippets']);
});