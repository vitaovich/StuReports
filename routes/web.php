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

Route::get('/users/import', function () {
    return view('Users.import');
});

Route::put('/users/import', 'CSVController@handleFile');

Route::get('/student_individual', function() {
	return view('student_individual');
});

Route::get('/aggregated_report/group/{group_id}/sprint/{sprint}', 'TeamReportsController@getTeamReport');

Route::resource('course', 'CourseController');
Route::resource('users', 'UsersController');

/*
/ Still working on the POST route for the report submissions.
*/

// Mike code below
Route::post('submit_team_report', 'ReportsController@putTeamReport');

//Route::get('/student_team', function() {
//	return view('student_team');
//});

//uses AvailabilityController to check if it's a submission day
Route::get('/student_team', 'AvailabilityController@getTeam');

Route::post('submit_individual_report', 'ReportsController@putIndividualReport');

//Route::get('/student_individual', function() {
//	return view('student_individual');
//});

//uses AvailabilityController to check if it's a submission day
Route::get('/student_individual', 'AvailabilityController@getIndividual');

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
