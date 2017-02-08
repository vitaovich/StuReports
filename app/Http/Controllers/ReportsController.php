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
    //TODO: the following two lines contain dummy data that needs to be changed
    $teamReport->sprint = 0;
    $teamReport->group_id = 1;
    $teamReport->save();
    return view('home');
  }

  public function getTeamReports()
  {
    $reports = TeamReport::all();
    return $reports;
  }

  // TODO: fix this (test to get long error messsages)
  public function putIndividualReport(Request $request)
  {
    $report = new IndividualReport;
    $report->student_id = Auth::user()->id;
    $report->private_comments = $request->private_comments;
    $report->sprint = 1; // dummy value
    $report->save();

    $reportID = $report->id;

    $timelog = new IndividualTimeLog;
    $timelog->individual_report_id = $reportID;
    $timelog->day = Carbon::today()->subDays(6);
    $timelog->hours = $request->saturday_hours;
    $timelog->description = $request->saturday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->individual_report_id = $reportID;
    $timelog->day = Carbon::today()->subDays(5);
    $timelog->hours = $request->sunday_hours;
    $timelog->description = $request->sunday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->individual_report_id = $reportID;
    $timelog->day = Carbon::today()->subDays(4);
    $timelog->hours = $request->monday_hours;
    $timelog->description = $request->monday_description;
    $timelog->save();


    $timelog = new IndividualTimeLog;
    $timelog->individual_report_id = $reportID;
    $timelog->day = Carbon::today()->subDays(3);
    $timelog->hours = $request->tuesday_hours;
    $timelog->description = $request->tuesday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->individual_report_id = $reportID;
    $timelog->day = Carbon::today()->subDays(2);
    $timelog->hours = $request->wednesday_hours;
    $timelog->description = $request->wednesday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->individual_report_id = $reportID;
    $timelog->day = Carbon::today()->subDays(1);
    $timelog->hours = $request->thursday_hours;
    $timelog->description = $request->thursday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->individual_report_id = $reportID;
    $timelog->day = Carbon::today();
    $timelog->hours = $request->friday_hours;
    $timelog->description = $request->friday_description;
    $timelog->save();

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
          $newTask->group_id = 1;
          $newTask->save();
          $index++;
        }
      }
    }

    $index = 0;

    if((is_array($priorTasks) && count($priorTasks) > 0) || (is_object($priorTasks) && !is_null($priorTasks)))
    {
      $priorTaskProgress = Input::get('latestProgress');
      $priorTaskStatuses = Input::get('taskStatus');
      $estimatedSprints = Input::get('estimatedSprints');
      foreach($priorTasks as $priorTask)
      {
        $taskReport = new TaskReport;
        $taskReport->task_id = $priorTask->id;
        $taskReport->latest_progress = $priorTaskProgress[$index];
        $taskReport->individual_report_id = $reportID;
        $taskReport->sprint = 1; // fix this
        $radio = $priorTaskStatuses[$index];

        if($radio == 'continuing')
        {
          $taskReport->remaining_sprints = $estimatedSprints[$index];
          $taskReport->reassigned = 0;
        }

        elseif($radio == 'reassigned')
        {
          $taskReport->remaining_sprints = 0;
          $taskReport->reassigned = 1;
        }

        else
        {
          $taskReport->remaining_sprints = 0;
          $taskReport->reassigned = 0;
        }
        $taskReport->save();
        $priorTaskStatus = $radio;
        $priorTaskEntry = Task::find($priorTask->id);//->first();
        $priorTaskEntry->status = $radio;
        $priorTaskEntry->update();
        $index++;
      }
    }
    return view('home');
  }
  
  public function getTeamReport(Request $request)
  {
	  $group = $request->group_id;
	  $sprint = $request->sprint;
	  $team_members = Project_group::findOrFail($group)->students;
	  //$time_logs = 
	  return view('team_report', compact('group','sprint', 'team_members'));
  }
}
