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
Route::resource('recipes', '\RecipeNow\Controllers\RecipeController');
Route::post('register', '\RecipeNow\Controllers\UserController@postRegister');
Route::post('login', '\RecipeNow\Controllers\UserController@postLogin');
Route::get('logout', '\RecipeNow\Controllers\UserController@getLogout');

Route::get('users', '\RecipeNow\Controllers\UserController@getAllUsers');
Route::get('users/{id}', '\RecipeNow\Controllers\UserController@getUserById');

