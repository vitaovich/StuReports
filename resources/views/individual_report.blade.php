@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		{{--@if (Auth::check() && (Auth::user()->isStudent() || Auth::user()->isInstructor()))--}}
			<div class="panel-heading">
				<h1 class="bg-primary">{{$student->name}}, Report for Sprint: {{$sprint}}</h1>
			</div>
			<div class="panel-body">
				<h2 class="bg-primary">Logged Hours</h2>

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
		{{--@endif--}}
		</div>
	</div>
</div>
@endsection
