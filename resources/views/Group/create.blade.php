@extends('layouts.app')

@section('title', 'Create group')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create a group</div>

            <div class="panel-body">
              <div class="container">
              {{ Form::open(['route' => 'projectgroups.store']) }}
              <div class="form-group row">
                  {{ Form::label('course_id', 'Course')}}
                  <!-- {{ Form::text('teacher_id') }} -->
                  <?php
                      $courses = App\Course::where([
                        ['teacher_id', '=', Auth::user()->id],
                        ['active', '=', '1']
                      ])->get();
                      $options = [];
                      //echo json_encode($instructors);
                      foreach($courses as $course)
                          $options[$course->id] = $course->quarterString() . ' ' . $course->year;
                  ?>
                  {{ Form::select('course_id', $options) }}
              </div>
              <div class="form-group row">
                  {{ Form::label('project', 'Project title') }}
                  {{ Form::text('project') }}
              </div>
              {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            </div>
          </div>
        </div>
    </div>
</div>


@endsection
