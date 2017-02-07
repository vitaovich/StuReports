@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		<div class="panel-heading"><h1 class="bg-primary">Sprint: {{$sprint}}, Group: {{$group}} Team Report</h1></div>
		<div class="panel-body">
			<h3 class="bg-primary">Members</h3>
			@foreach($team_members as $team_member)
				<br />{{$team_member->name}}
			@endforeach
			<h3 class="bg-primary">Logged Hours</h3>
			
			<h3 class="bg-primary">Tasks</h3>
			
			<h3 class="bg-primary">Team Reflection</h3>
		</div>
		</div>
	</div>
</div>
@endsection