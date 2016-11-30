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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/users/create', function () {
    return view('Users.create');
});

Route::post('/login', 'UsersController@loginUser');

Route::get('/student_individual', function() {
	return view('student_individual');
});

/*
/ Still working on the POST route for the report submissions.
*/

Route::get('/student_team', function() {
	return view('student_team');
});
