@extends('layouts.app')

@section('title', 'Edit group')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit a group</div>

            <div class="panel-body">
              <div class="container">
              {{ Form::model($project_group, ['route' => ['projectgroups.update', $project_group->id], 'method' => 'PUT']) }}
              <div class="form-group row">
                  {{ Form::label('course_id', 'Course')}}
                  <!-- {{ Form::text('teacher_id') }} -->
                  <?php
                      $courses = App\Course::where('teacher_id', '=', Auth::user()->id)->get()->toArray();
                      $options = [];
                      //echo json_encode($instructors);
                      foreach($courses as $course)
                          $options[$course['id']] = $course['quarter'] . ' ' . $course['year'];
                  ?>
                  {{ Form::select('course_id', $options, $project_group->course_id) }}
              </div>
              <div class="form-group row">
                  {{ Form::label('project', 'Project description') }}
                  {{ Form::text('project') }}
              </div>
              {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            </div>
          </div>
        </div>
    </div>
</div>


@endsection
