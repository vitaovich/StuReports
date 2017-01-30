@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading"><h1>CSCD {{$course->Quarter}} {{$course->Year}}</h1></div>
            <div class="panel-body">
              @if(Auth::user()->isInstructor())
              <table class="table table-striped">
                <tbody>
                  @foreach ($course->projects as $project)
                    <tr>
                      <td><div data-toggle="collapse" data-target="#project_{{$project->Group_id}}">
                        <h4><span class="caret"></span> Group {{$project->Group_id}}: {{$project->Project}}</h4>
                      </div>
                      <div id="project_{{$project->Group_id}}" class="collapse">
                        <ul>
                          @foreach ($project->student_group as $student)
                          <li>{{$student->user->name}}</li>
                          @endforeach
                        </ul>
                      </div>
                    </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>
          </div>
      </div>
  </div>
@endsection
