@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		@if (Auth::check() && (Auth::user()->isStudent() || Auth::user()->isInstructor()))
			<div class="panel-heading">
				<h1 class="bg-primary">Sprint: {{$sprint}}, Group: {{$group_id}} Report</h1>
			</div>
			<div class="panel-body">
				<h2 class="bg-primary">Members</h2>
				@foreach($team_members as $team_member)
					{{$team_member->name}}
					@if(!($reports->contains('student_id',$team_member->id)))
						<p>Did Not Submit a Report</p>
					@else
						<br />
					@endif
				@endforeach
				<h2 class="bg-primary">Logged Hours</h2>
				@if( ! empty($timeLogs))
					@foreach($timeLogs as $timeLog)
						<h4 class="bg-primary">{{$team_members[$reports[$timeLog[0]->individual_report_id]->student_id]->name}}</h4>
						<table>
						<tr>
							<th>
								<u>Date</u>
							</th>
							<th>
								<u>Hours</u>
							</th>
							<th>
								<u>Description</u>
							</th>
						</tr>
						@foreach($timeLog as $log)
							<tr>
								<td>
									{{$log['day']}}
								</td>
								<td>
									{{$log['hours']}}
								</td>
								<td>
									{{$log['description']}}
								</td>
							</tr>
						@endforeach
						</table>
					@endforeach
				@else
					<p>No Time Logs For This Sprint</p>
				@endif
				@if (Auth::check() && Auth::user()->isInstructor())
					<h2 class="bg-primary">Member Evaluations</h2>
				@endif
				<h2 class="bg-primary">Tasks</h2>
				@if ( ! empty($tasks))
					@foreach($team_members as $member)
						<h4 class="bg-primary">{{$member->name}}</h4>
						@foreach($tasks as $task)
							@if($task[0]->student_id == $member->id)
								<b><u><h4>{{$task[0]->task_name}}</h4></u>
								Original description:</b> {{$task[0]->description}}<br />
								@foreach($task[1] as $taskReport)
									<b>Progess in sprint {{$taskReport->sprint}}:</b> {{$taskReport->latest_progress}}<br />
								@endforeach
							<br />
							@endif
						@endforeach
					@endforeach
				@else
					<p>No Tasks For This Group</p>
				@endif
				@if (Auth::check() && Auth::user()->isInstructor())
					<h2 class="bg-primary">Task Evaluations</h2>
				@endif
				<h2 class="bg-primary">Team Report</h2>
				@if ( ! empty($team_report))
					<h4 class="bg-primary">Understand</h4>
						<b>Easiest: </b>{{$team_report->easiest_understand}}<br />
						<b>Hardest: </b>{{$team_report->hardest_understand}}<br />
					<h4 class="bg-primary">Approach</h4>
						<b>Easiest: </b>{{$team_report->easiest_approach}}<br />
						<b>Hardest: </b>{{$team_report->hardest_approach}}<br />
					<h4 class="bg-primary">Solve</h4>
						<b>Easiest: </b>{{$team_report->easiest_solve}}<br />
						<b>Hardest: </b>{{$team_report->hardest_solve}}<br />
					<h4 class="bg-primary">Evaluate</h4>
						<b>Easiest: </b>{{$team_report->easiest_evaluate}}<br />
						<b>Hardest: </b>{{$team_report->hardest_evaluate}}<br />
					<br />
					<b>Completion: </b>{{$team_report->pace}}<br />
					<b>Contact: </b>{{$team_report->client}}<br />
					<b>Comments: </b>{{$team_report->comments}}<br />
				@else
					Team Report not submitted
				@endif
				@if (Auth::check() && Auth::user()->isInstructor())
					<h2 class="bg-primary">Private Comments</h2>
					@foreach($reports as $report)
						<p><b><u>{{$team_members[$report->student_id]->name}}:</u></b> {{$report->private_comments}}</p>
					@endforeach
				@endif
			</div>
		@else
            <p>You must be logged in to view report</p>
		@endif
		</div>
	</div>
</div>
@endsection
