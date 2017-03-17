@extends('layouts.app')

@section('title', 'Create class')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading"><h1>Create a course</h1></div>

              <div class="panel-body">
                {{ Form::open(['url' => '/course', 'method' => 'post', 'class' =>'form-horizontal']) }}
                <div class="form-group">
                  {{ Form::label('course_title', 'Course Name:', ['class' => 'col-md-4 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::text('course_title', 'CSCD 488', ['class' => 'form-control']) }}
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
                    {{ Form::label('teacher_id', 'Instructor:', ['class' => 'col-md-4 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::select('teacher_id', $options) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('year', 'Year:', ['class' => 'col-md-4 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::number('year', date('Y'), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('quarter', 'Quarter:', ['class' => 'col-md-4 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::select('quarter', [0 => 'Fall', 1 => 'Winter', 2 => 'Spring', 3 => 'Summer']) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('active', 'Active:', ['class' => 'col-md-4 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::hidden('active', 0) }}
                    {{ Form::checkbox('active', 1, true) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('sprint_length', 'Sprint length (Days):', ['class' => 'col-md-4 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::number('sprint_length', '7', ['min' => '7', 'max' => '14', 'class' => 'form-control']) }}
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

@endsection
