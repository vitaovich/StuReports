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
  return App\Course::all();
});

Route::get('projectgroups', function(){
  return App\Project_group::all();
});
Route::get('studentgroups', function(){
  return App\Student_group::all();
});
Route::get('teamreports', function(){
  return App\TeamReport::all();
});

Route::get('individualreports', function(){
  return App\IndividualReport::all();
});

Route::get('timelogs', function(){
  return App\IndividualTimeLog::all();
});

Route::get('tasks', function(){
  return App\Task::all();
});

Route::get('taskreports', function(){
  return App\TaskReport::all();
});

//
//Model Testing, not sure if they should go here or in a controller
//

//Get all of a users tasks, based on a user id
Route::get('user/tasks/{user_id}', function($user_id){
	return App\User::findOrFail($user_id)->tasks;
});

//Get all of a users task reports, based on a user id
Route::get('user/task/reports/{user_id}', function($user_id){
	return App\User::findOrFail($user_id)->taskReports;
});

//Get a users individual reports, based on a user id
Route::get('user/reports/{user_id}', function($user_id){
	return App\User::findOrFail($user_id)->individualReports;
});

//Get a users individual report time logs, based on a individual report id
Route::get('report/time/logs/{individual_report_id}', function($individual_report_id){
	return App\IndividualReport::findOrFail($individual_report_id)->timeLogs;
});

//get a user's individual report member evalutations
Route::get('report/member/evaluations/{individual_report_id}', function($individual_report_id){
	return App\IndividualReport::findOrFail($individual_report_id)->memberEvaluations;
});

//gets the user being evaluated, based on member evaluation id
Route::get('report/member/evaluation/{id}', function($id){
	return App\Member_evaluation::findOrFail($id)->memberEvaluated;
});

//get a user's individual report task evalutations
Route::get('report/task/evaluations/{individual_report_id}', function($individual_report_id){
	return App\IndividualReport::findOrFail($individual_report_id)->taskEvaluations;
});

//gets the task being evaluated, based on task evaluation id
Route::get('report/task/evaluation/{id}', function($id){
	return App\Task_evaluation::findOrFail($id)->taskEvaluated;
});

//Get a task, based on a task id
Route::get('task/{task_id}', function($task_id){
	return App\Task::findOrFail($task_id);
});

//get all task reports for a task, based on a task id
Route::get('task/reports/{task_id}', function($task_id){
	return App\Task::findOrFail($task_id)->taskReports;
});

//get all students for a course, based on a course id
Route::get('course/students/{course_id}', function($course_id){
	return App\Course::findOrFail($course_id)->students;
});

//get all projects for a course, based on a course id
Route::get('course/projects/{course_id}', function($course_id){
	return App\Course::findOrFail($course_id)->projects;
});

//get all assignments for a course, based on a course id
Route::get('course/assignments/{course_id}', function($course_id){
	return App\Course::findOrFail($course_id)->assignments;
});

//get a project, based on a project id
Route::get('project/{project_id}', function($project_id){
	echo App\Project_group::findOrFail($project_id);
});

//get all project members, based on a project id
Route::get('project/memebers/{project_id}', function($project_id){
	echo App\Project_group::findOrFail($project_id)->students;
});

//get all project team reports, based on a project id
Route::get('project/reports/{project_id}', function($project_id){
	echo App\Project_group::findOrFail($project_id)->teamReports;
});

//get all project members, based on a project id
Route::get('project/tasks/{project_id}', function($project_id){
	echo App\Project_group::findOrFail($project_id)->tasks;
});