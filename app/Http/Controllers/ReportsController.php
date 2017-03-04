<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndividualTimeLog;
use App\IndividualReport;
use App\Task;
use App\TaskReport;
use App\TeamReport;
use App\Project_group;
use App\Member_evaluation;
use App\Task_evaluation;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ReportsController extends Controller
{
  public function putTeamReport(Request $request)
  {
    $teamReport = new TeamReport;
    $teamReport->easiest_understand = $request->easiest_understand;
    $teamReport->hardest_understand = $request->hardest_understand;
    $teamReport->easiest_approach = $request->easiest_approach;
    $teamReport->hardest_approach = $request->hardest_approach;
    $teamReport->easiest_solve = $request->easiest_solve;
    $teamReport->hardest_solve = $request->hardest_solve;
    $teamReport->easiest_evaluate = $request->easiest_evaluate;
    $teamReport->hardest_evaluate = $request->hardest_evaluate;
    $teamReport->pace = $request->pace;
    $teamReport->client = $request->client;
    $teamReport->comments = $request->comments;
    $teamReport->sprint = Auth::user()->course()->sprint;
    $teamReport->group_id = Auth::user()->group_id;
    if(is_null($teamReport->group_id))
    {
      $teamReport->group_id = 0;
    }
    $teamReport->submitted_by = Auth::user()->id;
    $teamReport->save();
    return view('home');
  }

  public function getTeamReports()
  {
    $reports = TeamReport::all();
    return $reports;
  }

  public function putIndividualReport(Request $request)
  {
    $report = new IndividualReport;
    $report->student_id = Auth::user()->id;
    $report->private_comments = $request->private_comments;
    $report->sprint = Auth::user()->course()->sprint;
    $totalHours = 0;
    $timelogHours = Input::get('timeloghours');
    foreach($timelogHours as $timelogHour)
    {
      $totalHours += $timelogHour;
    }
    $report->total_hours = $totalHours;
    $report->save();
    $reportID = $report->id;
    //$timelogHours = Input::get('timeloghours');
    $timeLogDescriptions = Input::get('timeLogDescriptions');
    $sprintLength = Auth::user()->course()->sprint_length;
    $index = 0;

    while($index < $sprintLength)
    {
      if(($timelogHours[$index] != "0" && $timelogHours[$index] != "") || $timeLogDescriptions[$index] != "")
      {
        $timelog = new IndividualTimeLog;
        $timelog->individual_report_id = $reportID;
        $timelog->day = Carbon::today()->subDays($sprintLength - $index - 1);
        $hours = $request->timeloghours[$index];
        $timelog->hours = $hours;
        $timelog->description = $request->timeLogDescriptions[$index];
        $timelog->save();
      }
      $index++;
    }
    $index = 0;
    $newTaskNames = Input::get('newTaskName');
    $newTaskDescriptions = Input::get('newTaskDescription');
    $priorTasks = Task::getTasks(Auth::user()->id);

    if(is_array($newTaskDescriptions) || is_object($newTaskDescriptions))
    {
      foreach ($newTaskDescriptions as $newDescription)
      {
        if($newDescription != "" && $newTaskNames[$index] != "")
        {
          $newTask = new Task;
          $newTask->description = $newDescription;
          $newTask->task_name = $newTaskNames[$index]; // problem line?
          $newTask->student_id = Auth::user()->id;
          $newTask->status = "new";
          $newTask->sprint_started = Auth::user()->course()->sprint;
          $newTask->group_id = Auth::user()->group_id;
          if(is_null($newTask->group_id))
          {
            $newTask->group_id = 0;
          }
          $newTask->save();
          $index++;
        }
      }
    }

    // beging teammate evaluation section
    $counter = 0;
    $teammates = User::getGroupmates(Auth::user()->group_id);
    if((is_array($teammates) && count($teammates) > 0) || (is_object($teammates) && !is_null($teammates)))
    {
      foreach($teammates as $teammate)
      {
        if($teammate->id != Auth::user()->id)
        {
          // now we are looking at each teammate's section.
          $taskConcurs = Input::get("teammateTaskConcur");
          $teammateExplains = Input::get("teammateTaskExplain");
          $teammateTasks = Task::getTasks($teammate->id);
          $taskCounter = 0;
          if((is_array($teammateTasks) && count($teammateTasks) > 0) || (is_object($teammateTasks) && !is_null($teammateTasks)))
          {
            foreach($teammateTasks as $teammateTask)
            {
                $taskEvaluation = new Task_evaluation;
                $taskEvaluation->task_id = $teammateTask->id;
                $taskEvaluation->individual_report_id = $report->id;
                $taskEvaluation->concur = $taskConcurs[$teammate->id][$taskCounter]; // problem line
                $taskEvaluation->comments = $teammateExplains[$teammate->id][$taskCounter];
                $taskEvaluation->save();
                $taskCounter++;
            }
          }
          $memberEvaluation = new Member_evaluation;
          $memberEvaluation->individual_report_id = $report->id;
          $memberEvaluation->concur_hours = "yes";
          $memberEvaluation->comments_hours = "0th sprint";
          if(Auth::user()->course()->sprint > 0)
          {
            $hours = Input::get("hourEvaluations");
            $hour_comments = Input::get("hourEvaluationsExplanation");
            $memberEvaluation->concur_hours = $hours[$teammate->id];
            $memberEvaluation->comments_hours = $hour_comments[$teammate->id];
          }
          $performing = Input::get("teammateExpectations");
          $memberEvaluation->performing = $performing[$teammate->id];
          $comments = Input::get("teammateExpectationsExplanation");
          $memberEvaluation->comments = $comments[$teammate->id];
          $memberEvaluation->student_id = $teammate->id;
          $memberEvaluation->save();
        }
      }
    }

    $index = 0;
    if((is_array($priorTasks) && count($priorTasks) > 0) || (is_object($priorTasks) && !is_null($priorTasks)))
    {
      $priorTaskProgress = Input::get('latestProgress');
      $priorTaskStatuses = Input::get('taskStatus');
      $estimatedSprints = Input::get('estimatedSprints');
      $reassignments = Input::get('teammateReassign');
      foreach($priorTasks as $priorTask)
      {
        $taskReport = new TaskReport;
        $taskReport->task_id = $priorTask->id;
        $taskReport->latest_progress = $priorTaskProgress[$index];
        $taskReport->individual_report_id = $reportID;
        $taskReport->sprint =  Auth::user()->course()->sprint;
        $radio = $priorTaskStatuses[$index];
        $priorTaskEntry = Task::find($priorTask->id);//->first();

        if($radio == 'continuing')
        {
          $taskReport->remaining_sprints = $estimatedSprints[$index];
          $taskReport->reassigned = 0;
        }

        elseif($radio == 'reassigned')
        {
          $taskReport->reassigned = $reassignments[$index];
          $taskReport->remaining_sprints = $estimatedSprints[$index];
          $priorTaskEntry->student_id = $reassignments[$index];
        }

        else
        {
          $taskReport->remaining_sprints = 0;
          $taskReport->reassigned = 0;
        }
        $taskReport->save();
        $priorTaskStatus = $radio;
        if($radio == 'reassigned')
        {
          $priorTaskStatus = 'continuing';
        }
        $priorTaskEntry->status = $priorTaskStatus;
        $priorTaskEntry->update();
        $index++;
      }
    }
    return view('home');
  }
}
