@extends('layouts.app')

@section('title', 'Home')

@section('content')
<link href="/css/reports.css" rel="stylesheet">
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="bg-primary">Senior Project 
					@if($course->quarter == 1)
						Fall
					@elseif($course->quarter == 2)
						Winter
					@elseif($course->quarter == 3)
						Spring
					@elseif($course->quarter == 4)
						Summer
					@endif
					{{$course->year}}</h1>
					<h2>Instructor: {{$instructor->name}}</h2>
					Email: {{$instructor->email}}
			</div>
            <div class="panel-body">
                <h3 class="bg-primary">Status Reports</h3>
					<table>
						<tr>
							<th>
							
							</th>
							<th>
								<b><u>Review</b></u>
							</th>
						</tr>
						<tr>
							<th>
								<b><u>Sprint</b></u>
							</th>
							<th>
								<b><u>Individual</b></u>
							</th>
							<th>
								<b><u>Team</b></u>
							</th>
						</tr>
						@for($i = 1; $i <= $course->sprint; $i++)
							<tr>
								<td>
									{{$i}}
								</td>
								<td>
									@if($reports->contains('sprint', $i))
										<a href="/individual_report/user/{{$user->id}}/sprint/{{$i}}">View</a>
									@else
										Not Submitted
									@endif
								</td>
								<td>
									@if(!empty($group))
										<a href="/aggregated_report/group/{{$group->id}}/sprint/{{$i}}">View</a>
									@endif
								</td>
							</tr>
						@endfor
					</table>
                <h3 class="bg-primary">Announcements</h3>
					@if(! empty($announcements))
						@foreach($announcements as $announcement)
							{{$announcement->announcement}}
							<hr>
						@endforeach
					@else
						No Announcements
					@endif
              </div>
          </div>
      </div>
  </div>
@endsection
