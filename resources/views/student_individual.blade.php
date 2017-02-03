@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
      <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
          @if (Auth::check() && Auth::user()->isStudent())
          <h2 id="timeLogsHeader">Time Logs</h2>
          <form class="form-horizontal" method="POST" action="/submit_individual_report">
             {!! csrf_field() !!}
            <table>
              <tr>
                <th>Day</th><th>Hours</th><th>On what?</th>
              </tr>
              <tr>
                <td>Saturday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="saturday_hours" name="saturday_hours"></td><td><input type="text" class="timeLogDescription" id="saturday_description" name="saturday_description"></td>
              </tr>
              <tr>
                <td>Sunday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="sunday_hours" name="sunday_hours"></td><td><input type="text" class="timeLogDescription" id="sunday_description" name="sunday_description"></td>
              </tr>
              <tr>
                <td>Monday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="monday_hours" name="monday_hours"></td><td><input type="text" class="timeLogDescription" id="monday_description" name="monday_description"></td>
              </tr>
              <tr>
                <td>Tuesday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="tuesday_hours" name="tuesday_hours"></td><td><input type="text" class="timeLogDescription" id="tuesday_description" name="tuesday_description"></td>
              </tr>
              <tr>
                <td>Wednesday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="wednesday_hours" name="wednesday_hours"></td><td><input type="text" class="timeLogDescription" id="wednesday_description" name="wednesday_description"></td>
              </tr>
              <tr>
                <td>Thursday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="thursday_hours" name="thursday_hours"></td><td><input type="text" class="timeLogDescription" id="thursday_description" name="thursday_description"></td>
              </tr>
              <tr>
                <td>Friday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="friday_hours" name="friday_hours"></td><td><input type="text" class="timeLogDescription" id="friday_description" name="friday_description"></td>
              </tr>
            </table>
            <br />
            <h2 id="newTaskHeader">New Tasks</h2>
            <p id="javascriptDisabled">Note: JavaScript is disabled. For a new task to be submitted, ensure that both the title and description are valid.</p>
            <table id="tasksTable">
              <tr>
               <th>Title</th><th>Description</th>
              </tr>
              <tr id="rowID1">
                <td><input type="text" name="newTaskName[]" class="newTaskNameClass"></td><td><input type="text" name="newTaskDescription[]" class="newTaskDescriptionClass"</td>
              </tr>
              <tr id="rowID2">
                <td><input type="text" name="newTaskName[]" class="newTaskNameClass"></td><td><input type="text" name="newTaskDescription[]" class="newTaskDescriptionClass"</td>
              </tr>
              <tr id="rowID3">
                <td><input type="text" name="newTaskName[]" class="newTaskNameClass"></td><td><input type="text" name="newTaskDescription[]" class="newTaskDescriptionClass"</td>
              </tr>
              <tr id="rowID4">
                <td><input type="text" name="newTaskName[]" class="newTaskNameClass"></td><td><input type="text" name="newTaskDescription[]" class="newTaskDescriptionClass"</td>
              </tr>
              <tr id="rowID5">
                <td><input type="text" name="newTaskName[]" class="newTaskNameClass"></td><td><input type="text" name="newTaskDescription[]" class="newTaskDescriptionClass"</td>
              </tr>
              <tr id="rowID6">
                <td><input type="text" name="newTaskName[]" class="newTaskNameClass"></td><td><input type="text" name="newTaskDescription[]" class="newTaskDescriptionClass"</td>
              </tr>
            </table>
            <script type="text/javascript" src="{!! asset('js/NewTask.js') !!}"></script>
            <br />
            <!-- {{ $priorReports = App\Task::where('Student_id', Auth::user()->id)->get() }} -->
            <?php $priorReports = App\Task::getTasks(Auth::user()->id);//->get();
                // I also want to get all teammate IDs here
                // TODO only one radio button in total is selectable
                $counter = 0;
             ?>
            @foreach ($priorReports as $priorReport)
            <?php if($counter == 0)
              echo '<h2>Prior Tasks</h2>';
             ?>
              <div class="oldTaskDiv">
                <h4 class="taskNameHeader">Task Name:</h4> <p>{{ $priorReport->Task_name }}</p>
                <h4>Original Description:</h4> <p>{{ $priorReport->Description }}</p>
                <h4>Latest Progress</h4>
                <input type="text" name="latestProgress[]" class="latestProgressClass" required>
                <h4>Status</h4>
                <div class="statusPointsClass">
                  <div class="statusOptionsClass">
                    <input type="radio" name="taskStatus[<?php echo $counter ?>]" value="continuing" checked><p>Continuing</p> <p class="estimatedNumberOfSprintsClass">Estimated number of sprints to completion: </p> <input type="number" name="estimatedSprints[]" min="1"  max="30" step="1" value="1">
                  </div>
                  <div class="statusOptionsClass">
                    <input type="radio" name="taskStatus[<?php echo $counter ?>]" value="completed"><p> Completed</p>
                  </div>
                  <div class="statusOptionsClass">
                    <input type="radio" name="taskStatus[<?php echo $counter ?>]" value="abandoned"><p>Abandoned</p>
                  </div>
                  <div class="statusOptionsClass">
                    <input type="radio" name="taskStatus[<?php echo $counter ?>]" value="reassigned"><p>Reassigned to: </p>
                  </div>
                </div>
              </div>
              <?php $counter++; ?>
            @endforeach
            <p>Private Comments</p>
            <input type="text" name="private_comments" id="private_comments">
            <br>
            <input type="submit" value="Submit"/>
          </form>

          <h2 id="teamTasks">Teammate Accountability (Private)</h2>
          @else
            <p>You must be logged in as a student to submit a report</p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
