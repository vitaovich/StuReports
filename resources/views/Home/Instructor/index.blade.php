@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">CSCD {{$course->Quarter}} {{$course->Year}}</div>

            <div class="panel-body">
              @if(Auth::user()->isInstructor())
                @foreach ($course->projects as $project)
                  <div data-toggle="collapse" data-target="#project_{{$project->Group_id}}">

                    <h4><span class="caret"></span> Group {{$project->Group_id}}: {{$project->Project}}</h4>
                  </div>
                  <div id="project_{{$project->Group_id}}" class="collapse container">
                      @foreach ($project->student_group as $student)
                      <p>{{$student->user->name}}</p>
                      @endforeach
                  </div>
                @endforeach
              @endif
            </div>
          </div>
      </div>
  </div>
@endsection
