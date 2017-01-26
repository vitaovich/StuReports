<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndividualTimeLog;
use App\IndividualReport;
use App\Task;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ReportsController extends Controller
{
  public function putTeamReport(Request $request)
  {
    $teamReport = new TeamReport;
    $teamReport->Easiest_Understand = $request->Easiest_Understand;
    $teamReport->Hardest_Understand = $request->Hardest_Understand;
    $teamReport->Easiest_Approach = $request->Easiest_Approach;
    $teamReport->Hardest_Approach = $request->Hardest_Approach;
    $teamReport->Easiest_Solve = $request->Easiest_Solve;
    $teamReport->Hardest_Solve = $request->Hardest_Solve;
    $teamReport->Easiest_Evaluate = $request->Easiest_Evaluate;
    $teamReport->Hardest_Evaluate = $request->Hardest_Evaluate;
    $teamReport->Pace = $request->Pace;
    $teamReport->Client = $request->Client;
    $teamReport->Comments = $request->Comments;
    //TODO: the following two lines contain dummy data that needs to be changed
    $teamReport->Sprint = 0;
    $teamReport->Group_id = 1;
    $teamReport->save();
    return view('home');
  }

  public function getTeamReports()
  {
    $reports = TeamReport::all();
    return $reports;
  }

  // Deemed unnecessary
  /*
  public function getContinuingTasks()
  {
    // $tasks = Task::where()->get();
    $tasks = Task::where('Student_id', '=', Auth::user()->id)
    ->where('Status', '=', 'new')
    ->orWhere->('Status', '=', 'continuing')->get();
    return $tasks;
  }
  */
  // TODO: fix this (test to get long error messsages)
  public function putIndividualReport(Request $request)
  {
    $report = new IndividualReport;
    $report->Student_id = Auth::user()->id;
    $report->Private_Comments = $request->Private_Comments;
    $report->Sprint = 1; // dummy value
    $report->save();

    $reportID = $report->Individual_Report_id;

    $timelog = new IndividualTimeLog;
    $timelog->Individual_Report_id = $reportID;
    $timelog->Day = Carbon::today()->subDays(6);
    $timelog->Hours = $request->saturday_hours;
    $timelog->Description = $request->saturday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->Individual_Report_id = $reportID;
    $timelog->Day = Carbon::today()->subDays(5);
    $timelog->Hours = $request->sunday_hours;
    $timelog->Description = $request->sunday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->Individual_Report_id = $reportID;
    $timelog->Day = Carbon::today()->subDays(4);
    $timelog->Hours = $request->monday_hours;
    $timelog->Description = $request->monday_description;
    $timelog->save();


    $timelog = new IndividualTimeLog;
    $timelog->Individual_Report_id = $reportID;
    $timelog->Day = Carbon::today()->subDays(3);
    $timelog->Hours = $request->tuesday_hours;
    $timelog->Description = $request->tuesday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->Individual_Report_id = $reportID;
    $timelog->Day = Carbon::today()->subDays(2);
    $timelog->Hours = $request->wednesday_hours;
    $timelog->Description = $request->wednesday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->Individual_Report_id = $reportID;
    $timelog->Day = Carbon::today()->subDays(1);
    $timelog->Hours = $request->thursday_hours;
    $timelog->Description = $request->thursday_description;
    $timelog->save();

    $timelog = new IndividualTimeLog;
    $timelog->Individual_Report_id = $reportID;
    $timelog->Day = Carbon::today();
    $timelog->Hours = $request->friday_hours;
    $timelog->Description = $request->friday_description;
    $timelog->save();

    $index = 0;
    $newTaskNames = Input::get('newTaskName');
    $newTaskDescriptions = Input::get('newTaskDescription');
    if(is_array($newTaskDescriptions) || is_object($newTaskDescriptions))
    {
      foreach ($newTaskDescriptions as $newDescription)
      {
        if($newDescription != "" && $newTaskNames[$index] != "")
        {
          $newTask = new Task;
          $newTask->Description = $newDescription;
          $newTask->Task_name = $taskNames[$index];
          $newTask->Student_id = Auth::user()->id;
          $newTask->Status = "new";
          $newTask->Group_id = 1;
          $newTask->save();
          $index++;
        }
      }
    }

    // work in progress
    $oldTaskProgress = Input::get('latestProgress');
    $oldTaskStatus = Input::get('taskStatus');



    return view('home');
  }
}
