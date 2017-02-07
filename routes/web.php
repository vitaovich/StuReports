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

Route::get('/users/import', function () {
    return view('Users.import');
});

Route::put('/users/import', 'CSVController@handleFile');

Route::get('/classes/create', function () {
    return view('Class.create');
});

Route::get('/student_individual', function() {
	return view('student_individual');
});

Route::resource('course', 'CourseController');

/*
/ Still working on the POST route for the report submissions.
*/

// Mike code below
Route::post('submit_team_report', 'ReportsController@putTeamReport');

Route::get('/student_team', function() {
	return view('student_team');
});

Route::post('submit_individual_report', 'ReportsController@putIndividualReport');

Route::get('/student_individual', function() {
	return view('student_individual');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/home/admin', function()
{
  return view('Home.Admin.index');
});
Route::get('/home/instructor', function()
{
  $teacher_id = Auth::user()->id;
  $courses = App\Course::where([
                                ['teacher_id', "=", $teacher_id],
                                ['active', "=", true],
                              ])->get();
  return view('Home.Instructor.index', ['courses' => $courses]);
});
