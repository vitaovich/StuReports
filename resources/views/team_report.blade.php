@extends('layouts.app')

@section('content')
<link href="/css/reports.css" rel="stylesheet">
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		@if (Auth::check() && (Auth::user()->isStudent() || Auth::user()->isInstructor()))
			<div class="panel-heading">
				<h1 class="bg-primary">Sprint: {{$sprint}}, Aggregated Team Report</h1>
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
						<b>Total Hours: </b>{{$reports[$timeLog[0]->individual_report_id]->total_hours}}
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
									{{date('d M', strtotime($log['day']))}}
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
				<h2 class="bg-primary">Tasks</h2>
				<h3 class="bg-primary">New Tasks</h3>
				@if ( ! empty($new_tasks))
					@foreach($new_tasks as $task)
						<hr>
						<b><u><h4>T.{{$task[0]->id}} {{$task[0]->task_name}}</h4></u></b>
						<b>Original description:</b> {{$task[0]->description}}<br />
						@foreach($task[1] as $taskReport)
							@if($taskReport->sprint == $sprint)
								<b>Latest Progress: </b>
							@else
								<b>Progess in sprint {{$taskReport->sprint}}: </b>
							@endif
							{{$taskReport->latest_progress}}<br />
							@if (Auth::check() && Auth::user()->isInstructor() && !empty($taskEvaluations))
								<br />
								<table>
								<col align="left">
								<col align="right">
								<col align="right">
								<tr>
									<th>
										<h4 class="bg-primary">Task Evaluations</h4>
									</th>
									</tr>
									<tr>
										<th>
											Member Name
										</th>
										<th>
											Concurs
										</th>
										<th>
											Comments
										</th>
									</tr>
								@foreach($taskEvaluations as $evaluation)
									@if($evaluation->task_id == $task[0]->id)
										<tr>
											<td>
												{{$team_members[$reports[$evaluation->individual_report_id]->student_id]->name}}:
											</td>
										@if($evaluation->concur == 'yes')
											<td><yes>Yes</yes></td>
										@elseif($evaluation->concur == 'no')
											<td><b><no>No</no></b></td>
										@else
											<td><maybe>Maybe</maybe></td>
										@endif
											<td>
												{{$evaluation->comments}}
											</td>
										</tr>
									@endif
								@endforeach
								</table>
							@endif
						@endforeach
					@endforeach
				@else
					<p>No New Tasks For This Group</p>
				@endif
				<h3 class="bg-primary">Continuing Tasks</h3>
				@if ( ! empty($continuing_tasks))
					@foreach($continuing_tasks as $task)
						<hr>
						<b><u><h4>T.{{$task[0]->id}} {{$task[0]->task_name}}</h4></u></b>
						<b>Original description:</b> {{$task[0]->description}}<br />
						@foreach($task[1] as $taskReport)
							@if($taskReport->sprint == $sprint)
								<b>Latest Progress: </b>
							@else
								<b>Progess in sprint {{$taskReport->sprint}}: </b>
							@endif
							{{$taskReport->latest_progress}}<br />
						@endforeach
							@if (Auth::check() && Auth::user()->isInstructor() && !empty($taskEvaluations))
								<br />
								<table>
								<col align="left">
								<col align="right">
								<col align="right">
								<tr>
									<th>
										<h4 class="bg-primary">Task Evaluations</h4>
									</th>
									</tr>
									<tr>
										<th>
											Member Name
										</th>
										<th>
											Concurs
										</th>
										<th>
											Comments
										</th>
									</tr>
								@foreach($taskEvaluations as $evaluation)
									@if($evaluation->task_id == $task[0]->id)
										<tr>
											<td>
												{{$team_members[$reports[$evaluation->individual_report_id]->student_id]->name}}:
											</td>
										@if($evaluation->concur == 'yes')
											<td><yes>Yes</yes></td>
										@elseif($evaluation->concur == 'no')
											<td><b><no>No</no></b></td>
										@else
											<td><maybe>Maybe</maybe></td>
										@endif
											<td>
												{{$evaluation->comments}}
											</td>
										</tr>
									@endif
								@endforeach
								</table>
							@endif
					@endforeach
				@else
					<p>No Continuing Tasks For This Group</p>
				@endif
				<h3 class="bg-primary">Completed Tasks</h3>
				@if ( ! empty($completed_tasks))
					@foreach($completed_tasks as $task)
						<hr>
						<b><u><h4>T.{{$task[0]->id}} {{$task[0]->task_name}}</h4></u></b>
						<b>Original description:</b> {{$task[0]->description}}<br />
						@foreach($task[1] as $taskReport)
							@if($taskReport->sprint == $sprint)
								<b>Latest Progress: </b>
							@else
								<b>Progess in sprint {{$taskReport->sprint}}: </b>
							@endif
							{{$taskReport->latest_progress}}<br />
						@endforeach
							@if (Auth::check() && Auth::user()->isInstructor() && !empty($taskEvaluations))
								<br />
								<table>
								<col align="left">
								<col align="right">
								<col align="right">
								<tr>
									<th>
										<h4 class="bg-primary">Task Evaluations</h4>
									</th>
									</tr>
									<tr>
										<th>
											Member Name
										</th>
										<th>
											Concurs
										</th>
										<th>
											Comments
										</th>
									</tr>
								@foreach($taskEvaluations as $evaluation)
									@if($evaluation->task_id == $task[0]->id)
										<tr>
											<td>
												{{$team_members[$reports[$evaluation->individual_report_id]->student_id]->name}}:
											</td>
										@if($evaluation->concur == 'yes')
											<td><yes>Yes</yes></td>
										@elseif($evaluation->concur == 'no')
											<td><b><no>No</no></b></td>
										@else
											<td><maybe>Maybe</maybe></td>
										@endif
											<td>
												{{$evaluation->comments}}
											</td>
										</tr>
									@endif
								@endforeach
								</table>
							@endif
					@endforeach
				@else
					<p>No Completed Tasks For This Group</p>
				@endif
				<h3 class="bg-primary">Abandoned Tasks</h3>
				@if ( ! empty($abandoned_taks))
					@foreach($abandoned_taks as $task)
						<hr>
						<b><u><h4>T.{{$task[0]->id}} {{$task[0]->task_name}}</h4></u></b>
						<b>Original description:</b> {{$task[0]->description}}<br />
						@foreach($task[1] as $taskReport)
							@if($taskReport->sprint == $sprint)
								<b>Latest Progress: </b>
							@else
								<b>Progess in sprint {{$taskReport->sprint}}: </b>
							@endif
								{{$taskReport->latest_progress}}<br />
						@endforeach
							@if (Auth::check() && Auth::user()->isInstructor() && !empty($taskEvaluations))
								<br />
								<table>
								<col align="left">
								<col align="right">
								<col align="right">
								<tr>
									<th>
										<h4 class="bg-primary">Task Evaluations</h4>
									</th>
									</tr>
									<tr>
										<th>
											Member Name
										</th>
										<th>
											Concurs
										</th>
										<th>
											Comments
										</th>
									</tr>
								@foreach($taskEvaluations as $evaluation)
									@if($evaluation->task_id == $task[0]->id)
										<tr>
											<td>
												{{$team_members[$reports[$evaluation->individual_report_id]->student_id]->name}}:
											</td>
										@if($evaluation->concur == 'yes')
											<td><yes>Yes</yes></td>
										@elseif($evaluation->concur == 'no')
											<td><b><no>No</no></b></td>
										@else
											<td><maybe>Maybe</maybe></td>
										@endif
											<td>
												{{$evaluation->comments}}
											</td>
										</tr>
									@endif
								@endforeach
								</table>
							@endif
					@endforeach
				@else
					<p>No Abandonded Tasks For This Group</p>
				@endif
				@if (Auth::check() && Auth::user()->isInstructor())
					<h2 class="bg-primary">Member Evaluations</h2>
					@if( ! empty($memberEvaluations))
						@foreach($team_members as $evaluated)
							<h4 class="bg-primary">{{$evaluated->name}}</h4>
							<table>
							<col align="left">
							<col align="left">
							<col align="right">
							<col align="right">
							<tr>
								<th>
									Evaluated By
								</th>
								<th>
									Concur Hours
								</th>
								<th>
									Performing
								</th>
								<th>
									Comments
								</th>
							</tr>
							@foreach($memberEvaluations as $evaluation)
								@if($evaluation->student_id == $evaluated->id)
									<tr>
										<td>
											{{ $team_members[$reports[$evaluation->individual_report_id]->student_id]->name }}
										</td>
										<td>
											@if($evaluation->concur_hours == 'yes')
												<yes>Yes</yes>
											@elseif($evaluation->concur_hours == 'no')
												<b><no>No</no></b>
											@else
												<maybe>Maybe</maybe>
											@endif
										</td>
										<td>
											@if($evaluation->performing == 'yes')
												<yes>Yes</yes>
											@elseif($evaluation->performing == 'no')
												<b><no>No</no></b>
											@else
												<maybe>Maybe</maybe>
											@endif
										</td>
										<td>
											{{$evaluation->comments}}
										</td>
									</tr>
								@endif
							@endforeach
							</table>
						@endforeach
					@else
						No Team Member Evaluations For This Sprint
					@endif
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
