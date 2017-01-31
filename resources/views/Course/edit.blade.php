@extends('layouts.app')

@section('title', 'Create class')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create a course</div>

            <div class="panel-body">
              <div class="container">
              {{ Form::model($course, ['route' => ['course.update', $course->id], 'method' => 'PUT']) }}
              <div class="form-group row">
                  {{ Form::label('teacher_id', 'Teacher')}}
                  {{ Form::text('teacher_id') }}
              </div>
              <div class="form-group row">
                  {{ Form::label('year', 'Year') }}
                  {{ Form::number('year') }}
              </div>
              <div class="form-group row">
                  {{ Form::label('quarter', 'Quarter') }}
                  {{ Form::select('quarter', ['Fall' => 'Fall', 'Winter' => 'Winter', 'Spring' => 'Spring', 'Summer' => 'Summer']) }}
              </div>
              <div class="form-group row">
                  {{ Form::label('course_number', 'Course#') }}
                  {{ Form::number('course_number') }}
              </div>
              <div class="form-group row">
                  {{ Form::label('sprint_length', 'Sprint length') }}
                  {{ Form::number('sprint_length') }}
              </div>
              {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            </div>
          </div>
        </div>
    </div>
</div>


@endsection
