@extends('layouts.app')

@section('title', 'Debug Mode')

@section('content')

<?php
    use App\Course;
    $debug_on = 1;
    $courses = Course::all();
    foreach($courses as $course)
    {
        if($course->active == 1)
        {
            if($course->reports_available == 0)
                $debug_on = 0;
        }
    }
 ?>

  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading text-center">Debug Mode</div>
              <div class="panel-body">
                @if(Auth::user()->isAdmin())
                  Debug mode is
                  @if($debug_on === 1)
                    enabled.
                  @else
                    disabled.
                  @endif
                  {{ Form::open(['url' => '/debug_submit', 'method' => 'put']) }}
                  {{ Form::label('on', 'Enable debug mode')}}
                  {{ Form::checkbox('on') }}
                  <br>
                  {{ Form::submit('Submit') }}
                  {{ Form::close() }}
                @endif
            </div>
          </div>
      </div>
  </div>
@endsection
