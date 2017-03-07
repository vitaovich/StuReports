<link href="/css/reports.css" rel="stylesheet">
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="bg-primary">{{$student->name}}, Report for Sprint: {{$sprint}}</h1>
			</div>
			<div class="panel-body">
				<h2 class="bg-primary">Logged Hours</h2>
					@if( ! empty($timeLogs))
						<h4 class="bg-primary">{{$student->name}}</h4>
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
						@foreach($timeLogs as $log)
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
				@else
					<p>No Time Logs For This Sprint</p>
				@endif
				<h2 class="bg-primary">Tasks</h2>
					@foreach($tasks as $task)
						<hr>
						<b><u><h4>{{$task[0]->task_name}}</h4></u>
						Original description:</b> {{$task[0]->description}}<br />
						@foreach($task[1] as $taskReport)
							@if($taskReport->sprint == $sprint)
								<b>Latest Progress: </b>
							@else
								<b>Progess in sprint {{$taskReport->sprint}}: </b>
							@endif
							{{$taskReport->latest_progress}}<br />
						@endforeach
					@endforeach
			</div>
		</div>
	</div>
</div>
