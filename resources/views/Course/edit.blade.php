@extends('layouts.app')

@section('title', 'Create class')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create a course</div>

            <div class="panel-body">
              <div class="container">
              {{ Form::model($course, ['route' => ['course.update', $course->Class_id], 'method' => 'PUT']) }}
              <div class="form-group row">
                  {{ Form::label('Teacher_id', 'Teacher')}}
                  {{ Form::text('Teacher_id') }}
              </div>
              <div class="form-group row">
                  {{ Form::label('Year', 'Year') }}
                  {{ Form::number('Year') }}
              </div>
              <div class="form-group row">
                  {{ Form::label('Quarter', 'Quarter') }}
                  {{ Form::select('Quarter', ['Fall' => 'Fall', 'Winter' => 'Winter', 'Spring' => 'Spring', 'Summer' => 'Summer']) }}
              </div>
              <div class="form-group row">
                  {{ Form::label('Course_Number', 'Course#') }}
                  {{ Form::number('Course_Number') }}
              </div>
              <div class="form-group row">
                  {{ Form::label('Sprint_length', 'Sprint length') }}
                  {{ Form::number('Sprint_length') }}
              </div>
              {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            </div>
          </div>
        </div>
    </div>
</div>


@endsection
