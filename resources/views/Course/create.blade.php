@extends('layouts.app')

@section('title', 'Create class')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Create a course</div>

              <div class="panel-body">
                {{ Form::open(['url' => '/course', 'method' => 'post', 'class' =>'form-horizontal']) }}
                <div class="form-group">
                  {{ Form::label('course_title', 'Course Name:', ['class' => 'col-sm-2 control-label']) }}
                  <div class="col-sm-10">
                    {{ Form::text('course_title', 'CSCD 488') }}
                  </div>
                </div>
                <div class="form-group">
                  <?php
                      $instructors = App\User::where('role', '=', 'Instructor')->get()->toArray();
                      $options = [];
                      //echo json_encode($instructors);
                      foreach($instructors as $instructor)
                          $options[$instructor['id']] = $instructor['name'];
                  ?>
                    {{ Form::label('teacher_id', 'Instructor:', ['class' => 'col-sm-2 control-label']) }}
                  <div class="col-sm-10">
                    {{ Form::select('teacher_id', $options) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('year', 'Year:', ['class' => 'col-sm-2 control-label']) }}
                  <div class="col-sm-10">
                    {{ Form::number('year', date('Y')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('quarter', 'Quarter:', ['class' => 'col-sm-2 control-label']) }}
                  <div class="col-sm-10">
                    {{ Form::select('quarter', [0 => 'Fall', 1 => 'Winter', 2 => 'Spring', 3 => 'Summer']) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('active', 'Active:', ['class' => 'col-sm-2 control-label']) }}
                  <div class="col-sm-10">
                    {{ Form::hidden('active', 0) }}
                    {{ Form::checkbox('active', 1, true) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('sprint_length', 'Sprint length (Weeks):', ['class' => 'col-sm-2 control-label']) }}
                  <div class="col-sm-10">
                    {{ Form::number('sprint_length', '1') }}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                  </div>
                </div>
                  {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>

@endsection
