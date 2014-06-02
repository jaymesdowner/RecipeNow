<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
 * Home Route
 */
Route::get('/', function() { return View::make('index'); });

/*
 * API Routes
 */
Route::group(array('prefix' => 'api'), function()
{
    Route::resource('recipes', '\RecipeNow\Controllers\RecipeController', ['except' => ['edit']]);
});

/*
 * Catch ALL Route
 */
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
Route::any('{path?}', function($path) { return View::make('index'); })->where('path', '.+');

//Route::post('register', '\RecipeNow\Controllers\UserController@postRegister');
//Route::post('login', '\RecipeNow\Controllers\UserController@postLogin');
//Route::get('logout', '\RecipeNow\Controllers\UserController@getLogout');
//
//Route::get('users', '\RecipeNow\Controllers\UserController@getAllUsers');
//Route::get('users/{id}', '\RecipeNow\Controllers\UserController@getUserById');

