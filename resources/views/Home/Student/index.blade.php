@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Student Home page</div>
            <div class="panel-body">
				<h3 class="bg-primary">Tasks</h3>
					<table width='35%'>
					<tr>
						<th>
							
						</th>
						<th>
							Assignment
						</th>
						<th>
							Assigned
						</th>
						<th>
							Due
						</th>
					</tr>
					@foreach($course_assignments as $assignment)
						<tr>
							<td>
								{{$assignment->code}}
							</td>
							<td>
								{{$assignment->assignment_name}}
							</td>
							<td>
								{{date('d M', strtotime($assignment->open_assignment))}}
							</td>
							<td>
								{{date('d M', strtotime($assignment->close_assignment))}}
							</td>
						</tr>
					@endforeach
					</table>
                <h3 class="bg-primary">Status Reports</h3>
					<table width="45%">
						<tr>
							<th>
							
							</th>
							<th>
								
							</th>
							<th>
								<b><u>Submit</b></u>
							</th>
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
								<b><u>Due
							</th>
							<th>
								<b><u>Individual</b></u>
							</th>
							<th>
								<b><u>Team
							</th>
							<th>
								<b><u>Individual</b></u>
							</th>
							<th>
								<b><u>Team</b></u>
							</th>
						</tr>
						@foreach($report_assignments as $report)
						<tr>
							<td>
								{{$report[0]->sprint}}
							</td>
							<td>
								{{date('d M', strtotime($report[0]->close_assignment))}}
							</td>
							@if($submitted->contains('assignment_id', $report[0]->id))
								<td>
									Submitted
								</td>
							@else
								<td>
									Not Submitted
								</td>
							@endif
							@if($submitted->contains('assignment_id', $report[1]->id))
								<td>
									Submitted
								</td>
							@else
								<td>
									Not Submitted
								</td>
							@endif
							<td>
								@if($submitted->contains('assignment_id', $report[0]->id))
									<a href="/individual_report/user/{{Auth::user()->id}}/sprint/{{$report[0]->sprint}}">View</a>
								@endif
							</td>
							<td>
								@if($submitted->contains('assignment_id', $report[1]->id))
									<a href="/aggregated_report/group/{{Auth::user()->group_id}}/sprint/{{$report[1]->sprint}}">View</a>
								@endif
							</td>
						</tr>
						@endforeach
					</table>
                <h3 class="bg-primary">Announcements</h3>
              </div>
          </div>
      </div>
  </div>
@endsection
