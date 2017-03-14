@extends('layouts.app')

@section('title', 'Import File')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading text-center">Import File</div>
              <div class="panel-body">
                @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isInstructor()))
                  <?php
                    if(Auth::user()->isInstructor()) //instructors can add students to their own courses
                    {
                      $courses = App\Course::where([
                        ['teacher_id', '=', Auth::user()->id],
                        ['active', '=', '1']
                      ])->get();
                    }
                    else //admin can add students to any active course
                    {
                      $courses = App\Course::where('active', '=', '1')->get();
                    }
                    $options = [];
                    //echo json_encode($instructors);
                    foreach($courses as $course)
                      $options[$course->id] = $course->course_title . ' ' . $course->quarterString() . ' ' . $course->year;
                  ?>
                  {{ Form::open(['url' => '/users/import', 'method' => 'put', 'files' => 'true']) }}
                  <div class="form-group">
                    {{ Form::label('csv', 'Choose a file')}}
                    {{ Form::file('csv') }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('course_id', 'Course to add to')}}
                    {{ Form::select('course_id', $options) }}
                  </div>
                  {{ Form::submit('Submit') }}
                  {{ Form::close() }}
                @else
                  <p>You must be logged in as an admin or instructor to import a CSV.</p>
                @endif
              </div>
          </div>
      </div>
  </div>
@endsection
