<?php use Carbon\Carbon;
use App\IndividualReport;
 ?>

@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
      <div class="panel-heading"><h1>{{ Auth::user()->group->project }}: Individual Report Sprint {{Auth::user()->course()->sprint}}</h1></div>
        <div class="panel-body">
          @if(IndividualReport::hasSubmitted(Auth::user()->id, Auth::user()->course()->sprint) == true)
          <p>You have already submitted an individual report for this sprint.</p>
          @elseif (Auth::check() && Auth::user()->isStudent())
          <h2 id="timeLogsHeader">Time Logs</h2>
          <form class="form-horizontal" method="POST" action="/submit_individual_report">
             {!! csrf_field() !!}
            <table>
              <tr>
                <th>Day</th><th>Hours</th><th>On what?</th>
              </tr>

                <?php
                  for($i = Auth::user()->course()->sprint_length - 1; $i >= 0; $i = $i-1)
                  {
                    echo
              '<tr>
                <td>
                  <p>'; echo Carbon::today()->subDays($i)->formatLocalized('%A, %B %d %Y'); echo '</p></td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="timeloghours[]" name="timeloghours[]" required></td><td><textarea class="timeLogDescription" id="timeLogDescriptions[]" rows="1" name="timeLogDescriptions[]"></textarea>
                </td>
              </tr>
              ';
                  }
                ?>
            </table>
            <br />
            <h2 id="newTaskHeader">New Tasks</h2>
            <p id="javascriptDisabled">Note: JavaScript is disabled. For a new task to be submitted, ensure that both the title and description are valid.</p>
            <table id="tasksTable">
              <tr>
               <th>Title</th><th>Description</th>
              </tr>
              <tr id="rowID1">
                <td><textarea name="newTaskName[]" class="newTaskNameClass"></textarea></td><td><textarea rows="1" name="newTaskDescription[]" class="newTaskDescriptionClass"></textarea></td>
              </tr>
              <tr id="rowID2">
                <td><textarea name="newTaskName[]" class="newTaskNameClass"></textarea></td><td><textarea rows="1" name="newTaskDescription[]" class="newTaskDescriptionClass"></textarea></td>
              </tr>
              <tr id="rowID3">
                <td><textarea name="newTaskName[]" class="newTaskNameClass"></textarea></td><td><textarea rows="1" name="newTaskDescription[]" class="newTaskDescriptionClass"></textarea></td>
              </tr>
              <tr id="rowID4">
                <td><textarea name="newTaskName[]" class="newTaskNameClass"></textarea></td><td><textarea rows="1" name="newTaskDescription[]" class="newTaskDescriptionClass"></textarea></td>
              </tr>
              <tr id="rowID5">
                <td><textarea name="newTaskName[]" class="newTaskNameClass"></textarea></td><td><textarea rows="1" name="newTaskDescription[]" class="newTaskDescriptionClass"></textarea></td>
              </tr>
              <tr id="rowID6">
                <td><textarea name="newTaskName[]" class="newTaskNameClass"></textarea></td><td><textarea rows="1" name="newTaskDescription[]" class="newTaskDescriptionClass"></textarea></td>
              </tr>
            </table>
            <script type="text/javascript" src="{!! asset('js/NewTask.js') !!}"></script>
            <br />
            <?php $priorReports = App\Task::getTasks(Auth::user()->id);//->get();
                $counter = 0;
                $teammateCounter = 0;
                $teammates = App\User::getGroupmates(Auth::user()->group_id);
             ?>
            @foreach ($priorReports as $priorReport)
            <?php if($counter == 0)
              echo '<h2>Prior Tasks</h2>';
             ?>
              <div class="oldTaskDiv">
                <h4 class="taskNameHeader">Task Name:</h4> <p>{{ $priorReport->task_name }}</p>
                <h4>Original Description:</h4> <p>{{ $priorReport->description }}</p>
                <h4>Latest Progress</h4>
                <textarea name="latestProgress[]" class="latestProgressClass" rows="1" required></textarea>
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
                    @foreach($teammates as $teammate)
                      @if($teammate->id != Auth::user()->id)
                      <input type="radio" name="teammateReassign[<?php echo $counter ?>]" value="<?php echo $teammate->id; ?>" <?php if($teammateCounter == 0) {echo "checked=\"true\"";} $teammateCounter++; ?>><p><?php echo "$teammate->name "; ?></p>
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
              <?php $counter++; ?>
            @endforeach

          <?php $counter = 0; ?>
           @foreach ($teammates as $teammate)


            @if($teammate->id != Auth::user()->id)
              @if($counter == 0)
                <h2 id="teamTasks">Teammate Accountability (Private)</h2>
              @endif
              <h3>{{$teammate->name}}</h3>
              <?php $teammateTasks = App\Task::getTasks($teammate->id); ?>
              @if(count($teammateTasks) == 0)
                <p>Does not have any current tasks</p>
              @endif
              @foreach($teammateTasks as $priorReport)
                <div class="oldTaskDiv">
                  <h4 class="taskNameHeader">Task Name:</h4> <p>{{ $priorReport->task_name }}</p>
                  <h4>Original Description:</h4> <p>{{ $priorReport->description }}</p>
                  <h4>Status</h4>
                  <p>{{$priorReport->status}}</p>
                  @if($priorReport->status != 'new')
                    <p>{{$priorReport->latest_progress}}</p>
                  @endif
                  <h4>Do you concur?</h4>
                  <div class="statusPointsClass">
                    <div class="statusOptionsClass">
                      <input type="radio" onclick="dontExplainTask(<?php echo "$teammate->id, $counter";?>)" name="teammateTaskConcur[<?php echo $teammate->id; ?>][<?php echo $counter ?>]" value="yes" checked><p>Yes</p>
                    </div>
                    <div class="statusOptionsClass">
                      <input type="radio" onclick="explainTask(<?php echo "$teammate->id, $counter";?>)" name="teammateTaskConcur[<?php echo $teammate->id; ?>][<?php echo $counter ?>]" value="no"><p>No (explain why)</p>
                    </div>
                    <div class="statusOptionsClass">
                      <input type="radio" onclick="explainTask(<?php echo "$teammate->id, $counter";?>)" name="teammateTaskConcur[<?php echo $teammate->id; ?>][<?php echo $counter ?>]" value="maybe"><p>Maybe (explain why)</p>
                    </div>
                    <div>
                       <p>Explain</p>
                      <textarea id="teammateTaskExplain_<?php echo "$teammate->id,$counter";?>" name="teammateTaskExplain[<?php echo $teammate->id; ?>][<?php echo $counter ?>]" rows="1" value=""></textarea>
                    </div>
                  </div>
                </div>
                <?php $counter++; ?>
              @endforeach
              @if(Auth::user()->course()->sprint > 0)
            <div class="statusPointsClass">
              @if(is_null(IndividualReport::getHours($teammate->id, Auth::user()->course()->sprint - 1)) || (IndividualReport::getHours($teammate->id, Auth::user()->course()->sprint - 1)) == 0)
                  <h4>{{ $teammate->name }} logged 0 hours or did not submit a report last sprint. Do you concur?</h4>
              @else
                <h4>{{$teammate->name}} logged <?php echo IndividualReport::getHours($teammate->id, Auth::user()->course()->sprint - 1) ?> hours. Do you concur?</h4>
              @endif

                <div class="statusOptionsClass">
                  <input type="radio" onclick="dontExplainHours(<?php echo $teammate->id; ?>)" name="hourEvaluations[<?php echo $teammate->id; ?>]" value="yes" checked><p>Yes</p>
                </div>
                <div class="statusOptionsClass">
                  <input type="radio" onclick="explainHours(<?php echo $teammate->id; ?>)" name="hourEvaluations[<?php echo $teammate->id; ?>]" value="no"><p>No (explain why)</p>
                </div>
                <div class="statusOptionsClass">
                  <input type="radio" onclick="explainHours(<?php echo $teammate->id; ?>)" name="hourEvaluations[<?php echo $teammate->id; ?>]" value="maybe"><p>Maybe (explain why)</p>
                </div>
                <div>
                   <p>Explain</p>
                  <textarea id="hourEvaluationsExplanation<?php echo $teammate->id; ?>" name="hourEvaluationsExplanation[<?php echo $teammate->id; ?>]" rows="1" value=""></textarea>
                </div>
            </div>
            @endif
              <div class="statusPointsClass">
                <h4>Overall, is {{$teammate->name}} meeting reasonable expectations?</h4>
                <div class="statusOptionsClass">
                  <input type="radio" onclick="dontExplainReasonable(<?php echo $teammate->id; ?>)" name="teammateExpectations[<?php echo $teammate->id; ?>]" value="yes" checked><p>Yes</p>
                </div>
                <div class="statusOptionsClass">
                  <input type="radio" onclick="explainReasonable(<?php echo $teammate->id; ?>)" name="teammateExpectations[<?php echo $teammate->id; ?>]" value="no"><p>No (explain why)</p>
                </div>
                <div class="statusOptionsClass">
                  <input type="radio"  onclick="explainReasonable(<?php echo $teammate->id; ?>)" name="teammateExpectations[<?php echo $teammate->id; ?>]" value="maybe"><p>Maybe (explain why)</p>
                </div>
                <div>
                   <p>Explain</p>
                  <textarea id="teammateExpectationsExplanation<?php echo $teammate->id; ?>" name="teammateExpectationsExplanation[<?php echo $teammate->id; ?>]" rows="1" value=""></textarea>
                </div>
              </div>
              <?php $counter = 0; ?>
            @endif
           @endforeach
           <h2>Private comments about your project</h2>
           <textarea name="private_comments" rows="1" id="private_comments"></textarea>
           <br>
           <input type="submit" value="Submit"/>
         </form>
          @else
            <p>You must be logged in as a student to submit a report</p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
