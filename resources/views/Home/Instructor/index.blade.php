

@extends('layouts.app')

@section('title', 'Home')

@section('styles')
@endsection

@section('scripts')
    <script>
      function allowDrop(ev) {
        ev.preventDefault();
      };

      function drag(ev) {
          ev.dataTransfer.setData("text", ev.target.id);
      };

      function drop(ev, list, groupid) {
          ev.preventDefault();
          var data = ev.dataTransfer.getData("text");
          var student_id = data.substring(0, data.indexOf("_student"));
          var CSRF_TOKEN = document.getElementsByName('csrf-token')[0].getAttribute('content');
          var formData = new FormData();
          formData.append("_method", "PUT");
          formData.append("_token", CSRF_TOKEN);
          formData.append("group_id", groupid);

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
              list.appendChild(document.getElementById(data));
            }
          }
          xhttp.open("POST", "/users/" + student_id, true);
          xhttp.send(formData);
      };
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
                <div class="col-md-3" ondrop="drop(event, unassigned_students_list_{{$course->id}}, 1)" ondragover="allowDrop(event)"  >
                  <h4>Students</h4>
                  <ul id="unassigned_students_list_{{$course->id}}">
                    @foreach ($course->students->where('group_id', 1) as $student)
                      <li id="{{$student->id}}_student"  draggable="true" ondragstart="drag(event)" >
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
                        <tr ondrop="drop(event, list_team_{{$project->id}}, {{$project->id}})" ondragover="allowDrop(event)"  >
                          <td>
                            <div data-toggle="collapse" data-target="#{{$project->id}}_project">
                              <h4>
                                <span class="caret"></span> Group {{$project->id}}: {{$project->project}}
                              </h4>
                            </div>
                            <div id="{{$project->id}}_project" class="collapse">
                              <ul id="list_team_{{$project->id}}">
                                @foreach ($project->students as $student)
                                <li id="{{$student->id}}_student"  draggable="true" ondragstart="drag(event)" >
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
