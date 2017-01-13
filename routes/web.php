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
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/users', 'UsersController@index');

Route::get('/users/create', function () {
    return view('Users.create');
});

Route::get('/classes/create', function () {
    return view('Class.create');
});

Route::get('/student_individual', function() {
	return view('student_individual');
});

/*
/ Still working on the POST route for the report submissions.
*/

Route::get('/student_team', function() {
	return view('student_team');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
