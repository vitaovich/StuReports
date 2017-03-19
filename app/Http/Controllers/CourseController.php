<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Course;
use App\Task_evaluation;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('year','desc')->orderBy('quarter', 'desc')->paginate(15);
        return view('Course.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $course = new Course;
      $course->teacher_id = $request->teacher_id;
      $course->year = $request->year;
      $course->quarter = $request->quarter;
      $course->active = $request->active;
      $course->course_title = $request->course_title;
      $course->sprint_length = $request->sprint_length;

      $course->save();
      Artisan::call('sprint:update');
      return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view("Course.edit", ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->teacher_id = $request->teacher_id;
        $course->year = $request->year;
        $course->quarter = $request->quarter;
        $course->active = $request->active;
        $course->course_title = $request->course_title;
        $course->sprint_length = $request->sprint_length;

        $course->save();
        Artisan::call('sprint:update');
        return redirect('/home/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        foreach($course->projects as $project)
        {
          $members = $project->students;

          foreach($members as $member)
          {
              $member->group_id = null;
              $member->course_id = null;
              $member->save();
          }

          $tasks = $project->tasks;

          foreach($tasks as $task)
          {
              $taskevals = Task_evaluation::where('task_id', '=', $task->id)->get();

              foreach($taskevals as $taskeval)
                  $taskeval->delete();

              $taskReports = $task->taskReports;

              foreach($taskReports as $taskReport)
                  $taskReport->delete();

              $task->delete();
          }

          $project->delete();
        }

        foreach($course->students as $student)
          $student->delete();

        $course->delete();

        return redirect('/course');
    }
}
