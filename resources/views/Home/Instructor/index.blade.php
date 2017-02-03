@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if(isset($courses))
          @foreach($courses as $course)
            <div class="panel panel-default">
              <div class="panel-heading">
                  <h1>CSCD {{$course->quarter}} {{$course->year}}</h1>
              </div>
            <div class="panel-body">
              <table class="table table-striped">
                <tbody>
                  @foreach ($course->projects as $project)
                    <tr>
                      <td><div data-toggle="collapse" data-target="#project_{{$project->id}}">
                        <h4><span class="caret"></span> Group {{$project->id}}: {{$project->project}}</h4>
                      </div>
                      <div id="project_{{$project->id}}" class="collapse">
                        <ul>
                          @foreach ($project->students as $student)
                          <li>{{$student->name}}</li>
                          @endforeach
                        </ul>
                      </div>
                    </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            </div>
          @endforeach
        @endif
      </div>
  </div>
@endsection
