

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
          ev.dataTransfer.setData("parentid", ev.target.parentNode.id);
      };

      function drop(ev, list, groupid) {
          ev.preventDefault();
          var data = ev.dataTransfer.getData("text");
          var parent_element = ev.dataTransfer.getData("parentid");
          var student_id = data.substring(0, data.indexOf("_student"));
          var CSRF_TOKEN = document.getElementsByName('csrf-token')[0].getAttribute('content');
          var formData = new FormData();
          formData.append("_method", "PUT");
          formData.append("_token", CSRF_TOKEN);
          formData.append("group_id", groupid);

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
              studentElement = document.getElementById(data);
              list.appendChild(studentElement);

              // console.log("parent: " + parent_element);
              var dropdown;
              if(parent_element.includes("list_team_")) {
                dropdown = document.getElementById("team_lead_project_" + parent_element.substring(10));
                removeStudentFromDropdown(dropdown, student_id);
              }
              else {
                var student_name = studentElement.getElementsByTagName('A')[0].textContent;
                dropdown = document.getElementById("team_lead_project_" + groupid);
                addStudentToDropDown(dropdown, student_id, student_name);
              }
            }
          }
          xhttp.open("POST", "/users/" + student_id, true);
          xhttp.send(formData);
      };

      function removeStudentFromDropdown(dropdown, student_id) {
        // console.log(dropdown);
          for (i = 0; i < dropdown.length; ++i){
              if (dropdown.options[i].value == student_id){
                // console.log(dropdown[i]);
                dropdown.remove(i);
              }
          }
      }

      function addStudentToDropDown(dropdown, student_id, student_name) {
          var option = document.createElement("OPTION");
          option.value = student_id;
          option.text = student_name;
          // console.log(option);
          dropdown.appendChild(option);
      }

      function updateProjectLead(project_id, element) {
        var optionValue = element[element.selectedIndex].value;
        console.log(optionValue);
        var CSRF_TOKEN = document.getElementsByName('csrf-token')[0].getAttribute('content');
        var formData = new FormData();
        formData.append("_method", "PUT");
        formData.append("_token", CSRF_TOKEN);
        formData.append("project_leader", optionValue);

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            console.log("Success");
          }
        }
        xhttp.open("POST", "/projectgroups/" + project_id, true);
        xhttp.send(formData);
      }

      function sendDelete(id) {
        document.getElementById('delete_form').id.value = id;
        document.getElementById('delete_form').submit();
      }
    </script>
@endsection

@section('content')

<form id='delete_form' action="/delete" method="POST">
  {{ csrf_field() }}
  <input type="hidden" name="thing" value="projectgroups">
  <input type="hidden" name="id" value="-1">

  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if(isset($courses) && count($courses) != 0)
          @foreach($courses as $course)
            <div class="panel panel-default">
              <div class="panel-heading">
                  <h1>CSCD {{$course->quarterString()}} {{$course->year}}</h1>
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
                        <th>Group Projects <span align='right'><a href="/projectgroups/create" class="btn-sm btn-primary">Create</a></span></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($course->projects as $project)
                        <tr ondrop="drop(event, list_team_{{$project->id}}, {{$project->id}})" ondragover="allowDrop(event)"  >
                          <td>
                            <div class="col-md-7" data-toggle="collapse" data-target="#{{$project->id}}_project">
                              <h4>
                                <span class="caret"></span> <a href="">Group {{$loop->index + 1}}: {{$project->project}}</a>
                              </h4>
                            </div>
                            <div class="col-md-5">
                              Team Leader:
                              <select id="team_lead_project_{{$project->id}}" onchange="updateProjectLead({{$project->id}}, this)">
                                {{$project_lead = $project->project_leader}}
                                  <option value="0">No Team Leader</option>
                                @foreach ($project->students as $student)
                                  @if ($student->id === $project_lead)
                                    <option value="{{$student->id}}" selected>{{$student->name}}</option>
                                  @else
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                  @endif
                                @endforeach
                              </select>
                              <br>
                              <a href="/projectgroups/{{$project->id}}/edit" class="btn-sm btn-primary">Edit</a>
                              <a href="javascript:sendDelete({{$project->id}})" class="btn-sm btn-danger">Delete</a>
                            </div>

                            <div id="{{$project->id}}_project" class="collapse col-md-12">
                              <ul id="list_team_{{$project->id}}">
                                @foreach ($project->students as $student)
                                <li id="{{$student->id}}_student" draggable="true" ondragstart="drag(event)" >
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
</form>
@endsection
