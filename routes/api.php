<?php

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

Route::get('users', 'UsersController@getUsers');
Route::get('users/{id}', 'UsersController@getUser');
Route::put('users', 'UsersController@putUser');

Route::get('classrooms', function(){
  return App\Classroom::all();
});

Route::get('projectgroups', function(){
  return App\Project_group::all();
});
