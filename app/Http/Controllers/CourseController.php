<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      $course = new Classroom;
      $course->Teacher_id = $request->teacher_id;
      $course->Year = $request->year;
      $course->Quarter = $request->quarter;
      $course->Course_Number = $request->course_number;
      $course->Sprint_length = $request->sprint_length;

      $course->save();

      return redirect('/home/admin');
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
        $course = Classroom::find($id);
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
        $course = Classroom::find($id);
        $course->Teacher_id = $request->Teacher_id;
        $course->Year = $request->Year;
        $course->Quarter = $request->Quarter;
        $course->Course_Number = $request->Course_Number;
        $course->Sprint_length = $request->Sprint_length;

        $course->save();

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
        //
    }
}
