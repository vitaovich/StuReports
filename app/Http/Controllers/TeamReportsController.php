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

class TeamReportsController extends Controller
{
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
			array_push($timeLogs, $timeLog);
		}
		$taskEvaluations = [];
		foreach($reports as $report)
		{
			$taskEvaluation = IndividualReport::findOrFail($report->id)->taskEvaluations;
			foreach($taskEvaluation as $taskEval)
			{
				array_push($taskEvaluations, $taskEval);
			}
		}
		$tasks = [];
		foreach($team_members as $member)
		{
			$member_tasks = User::findOrFail($member->id)->tasks;
			foreach($member_tasks as $task)
			{
				$task_and_Reports = [];
				array_push($task_and_Reports, $task);
				$taskReports = Task::findOrFail($task->id)->taskReports->where('sprint', '<=', $sprint);
				array_push($task_and_Reports, $taskReports);
				array_push($tasks, $task_and_Reports);
			}
		}
		$memberEvaluations = [];
		foreach($reports as $report)
		{
			$evaluations = IndividualReport::findOrFail($report->id)->memberEvaluations;
			array_push($memberEvaluations, $evaluations);
		}
		return view('team_report', compact('group_id', 'sprint', 'team_members', 'team_report', 'reports', 'timeLogs', 'tasks', 'memberEvaluations', 'taskEvaluations'));
	}
}