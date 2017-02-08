

@extends('layouts.app')

@section('title', 'Home')

@section('styles')
@endsection

@section('scripts')
    <script>
      function allowDrop(ev) {
        ev.preventDefault();
      }

      function drag(ev) {
          ev.dataTransfer.setData("text", ev.target.id);
      }

      function drop(ev, list) {
          ev.preventDefault();
          var data = ev.dataTransfer.getData("text");
          list.appendChild(document.getElementById(data));
      }
    </script>
@endsection

@section('content')

  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if(isset($courses) && count($courses) != 0)
          @foreach($courses as $course)
            <div class="panel panel-default">
              <div class="panel-heading">
                  <h1>CSCD {{$course->quarter}} {{$course->year}}</h1>
              </div>
              <div class="panel-body">
                <div class="col-md-3" ondrop="drop(event, unassigned_students_list_{{$course->id}})" ondragover="allowDrop(event)"  >
                  <h4>Students</h4>
                  <ul id="unassigned_students_list_{{$course->id}}">
                    @foreach ($course->students->where('group_id', null) as $student)
                      <li id="student_{{$student->id}}"  draggable="true" ondragstart="drag(event)" >
                        <a>{{$student->name}}</a>
                      </li>
                    @endforeach
                  </ul>
                </div>
                <div class="col-md-9">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Group Projects</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($course->projects as $project)
                        <tr ondrop="drop(event, list_team_{{$project->id}})" ondragover="allowDrop(event)"  >
                          <td>
                            <div data-toggle="collapse" data-target="#project_{{$project->id}}">
                              <h4>
                                <span class="caret"></span> Group {{$project->id}}: {{$project->project}}
                              </h4>
                            </div>
                            <div id="project_{{$project->id}}" class="collapse">
                              <ul id="list_team_{{$project->id}}">
                                @foreach ($project->students as $student)
                                <li id="student_{{$student->id}}"  draggable="true" ondragstart="drag(event)" >
                                  <a>{{$student->name}}</a>
                                </li>
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
            </div>
          @endforeach
        @else
          <div class="panel panel-default">
            <div class="panel-body">
              No active courses
            </div>
          </div>
        @endif
      </div>
  </div>
@endsection
