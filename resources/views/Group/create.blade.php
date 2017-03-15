@extends('layouts.app')

@section('title', 'Create group')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create a group</div>

            <div class="panel-body">
              <div class="container">
              {{ Form::open(['route' => 'projectgroups.store', 'class' =>'form-horizontal']) }}
              <div class="form-group">
                  {{ Form::label('project', 'Project title', ['class' => 'col-md-3 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::text('project', null, ['class' => 'form-control']) }}
                  </div>
              </div>
              <div class="form-group">
                  {{ Form::label('course_id', 'Course:', ['class' => 'col-md-3 control-label'])}}
                  <!-- {{ Form::text('teacher_id') }} -->
                  <?php
                      $courses = App\Course::where([
                        ['teacher_id', '=', Auth::user()->id],
                        ['active', '=', '1']
                      ])->get();
                      $options = [];
                      //echo json_encode($instructors);
                      foreach($courses as $course)
                          $options[$course->id] = $course->course_title . ' ' . $course->quarterString() . ' ' . $course->year;
                  ?>
                  <div class="col-md-6">
                    {{ Form::select('course_id', $options) }}
                  </div>
              </div>
              <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                  {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                </div>
              </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
    </div>
</div>


@endsection
