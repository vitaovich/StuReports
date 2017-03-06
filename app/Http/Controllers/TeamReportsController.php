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
use App\Course;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class TeamReportsController extends Controller
{
	public function getIndividualReport(Request $request)
	{
		$student = User::findOrFail($request->user_id);
		$sprint = $request->sprint;
		$tasks = [];
		$student_tasks = User::findOrFail($student->id)->tasks;
		$reports = User::findOrFail($student->id)->individualReports->where('sprint', '>=', $sprint);
		$reports = $reports->keyBy('id');
		$report = $reports->where('sprint', $sprint)->pop();
		if($report != null)
			$timeLogs = IndividualReport::findOrFail($report->id)->timeLogs;
		foreach($student_tasks as $task)
		{
			$task_and_Reports = [];
			array_push($task_and_Reports, $task);
			$taskReports = Task::findOrFail($task->id)->taskReports->where('sprint', '<=', $sprint);
			array_push($task_and_Reports, $taskReports);
			array_push($tasks, $task_and_Reports);
		}
		return view('individual_report',compact('student', 'timeLogs', 'sprint', 'tasks', 'reports'));
	}
	
	public function getGroupReports(Request $request)
	{
		$group = Project_group::findOrFail($request->group_id);
		$currentTime = Carbon::now();
		$report_assignments = Course::findOrFail($group->course_id)->assignments->where('sprint', '!=', null)->sortBy('code')->groupBy('sprint');
		return view('team_reports', compact('group', 'currentTime', 'report_assignments'));
	}
	
	public function getIndividualReports(Request $request)
	{
		$user = User::findOrFail($request->user_id);
		$currentTime = Carbon::now();
		$report_assignments = Course::findOrFail($user->course_id)->assignments->where('sprint', '!=', null)->sortBy('code')->groupBy('sprint');
		$submitted = User::findOrFail($user->id)->assignments;
		return view('individual_reports', compact('user', 'currentTime', 'report_assignments', 'submitted'));
	}
	
	public function getTeamReport(Request $request)
	{
		$group_id = $request->group_id;
		$sprint = $request->sprint;
		$team_members = Project_group::findOrFail($group_id)->students;
		$team_report = TeamReport::where('group_id',$group_id)->where('sprint', $sprint)->first();
		$reports = Project_group::findOrFail($group_id)->individualReports->where('sprint',$sprint);
		$team_members = $team_members->keyBy('id');
		$reports = $reports->keyBy('id');
		
		$timeLogs = [];
		foreach($reports as $report)
		{
			$timeLog = IndividualReport::findOrFail($report->id)->timeLogs;
			if(!empty($timeLog))
			{
				array_push($timeLogs, $timeLog);
			}
		}
		$taskEvaluations = [];
		foreach($reports as $report)
		{
			$taskEvaluation = IndividualReport::findOrFail($report->id)->taskEvaluations;
			if(!empty($taskEvaluation))
			{
				foreach($taskEvaluation as $taskEval)
				{
					if(!empty($taskEval))
					{
						array_push($taskEvaluations, $taskEval);
					}
				}
			}
		}
		$tasks = [];
		foreach($team_members as $member)
		{
			$member_tasks = User::findOrFail($member->id)->tasks;
			if(!empty($member_tasks))
			{
				foreach($member_tasks as $task)
				{
					if(!empty($task))
					{
						$task_and_Reports = [];
						array_push($task_and_Reports, $task);
						$taskReports = Task::findOrFail($task->id)->taskReports->where('sprint', '<=', $sprint);
						array_push($task_and_Reports, $taskReports);
						array_push($tasks, $task_and_Reports);
					}
				}
			}
		}
		$memberEvaluations = [];
		foreach($reports as $report)
		{
			$evaluations = IndividualReport::findOrFail($report->id)->memberEvaluations;
			if(!empty($evaluations))
			{
				foreach($evaluations as $eval)
				{
					if(!empty($eval))
					{
						array_push($memberEvaluations, $eval);
					}
				}
			}
		}
		return view('team_report', compact('group_id', 'sprint', 'team_members', 'team_report', 'reports', 'timeLogs', 'tasks', 'memberEvaluations', 'taskEvaluations'));
	}
}