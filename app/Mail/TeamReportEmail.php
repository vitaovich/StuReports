<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Project_group;
use App\TeamReport;
use App\IndividualReport;
use App\Task;

class TeamReportEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $group_id = $this->user->group_id;
        $sprint = $this->user->course()->sprint;
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
    			foreach($evaluations as $eval)
    			{
    				array_push($memberEvaluations, $eval);
    			}
    		}
    		return $this->subject("Team Report, Group " . $group_id . ", Sprint " . $sprint)
                    ->view('emails.team_report', [
                      'group_id' => $group_id,
                      'sprint' => $sprint,
                      'team_members' => $team_members,
                      'team_report' => $team_report,
                      'reports' => $reports,
                      'timeLogs' => $timeLogs,
                      'tasks' => $tasks,
                      'memberEvaluations' => $memberEvaluations,
                      'taskEvaluations' => $taskEvaluations
                    ]);
    }
}
