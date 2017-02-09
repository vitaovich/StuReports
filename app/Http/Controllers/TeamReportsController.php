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
		
		$timeLogs = [];
		foreach($reports as $report)
		{
			$tl = IndividualReport::findOrFail($report->id)->timeLogs;
			array_push($timeLogs, $tl);
		}
		
		$taskReports = [];
		foreach($reports as $report)
		{
			$tr = IndividualReport::findOrFail($report->id)->taskReports;
			array_push($taskReports, $tr);
		}
		return view('team_report', compact('group_id', 'sprint', 'team_members', 'team_report', 'reports', 'timeLogs', 'taskReports'));
	}
}