@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Student Home page</div>
            <div class="panel-body">
				<h3 class="bg-primary">Tasks</h3>
                <h3 class="bg-primary">Status Reports</h3>
					<table width="35%">
						<tr>
							<th>
								Sprint
							</th>
							<th>
								Submitted
							</th>
							<th>
								Report
							</th>
						</tr>
						@foreach($course_assignments as $assignment)
							@if($assignment->code[0] == 'I')
								<tr>
									<td>
										Individual Report: {{$assignment->sprint}}
									</td>
										@if($submitted->contains('assignment_id', $assignment->id))
											<td>
												Submitted
											</td>
											<td>
												<a href="/individual_report/user/{{Auth::user()->id}}/sprint/{{$assignment->sprint}}">Viewable</a>
											</td>
										@else
											<td>
												Not Submitted
											</td>
										@endif
									</td>
								</tr>
							@elseif($assignment->code[0] == 'T')
								<tr>
									<td>
										Team Report: {{$assignment->sprint}}
									</td>
										@if($submitted->contains('assignment_id', $assignment->id))
											<td>
												Submitted
											</td>
											<td>
												<a href="/aggregated_report/group/{{Auth::user()->group_id}}/sprint/{{$assignment->sprint}}">Viewable</a>
											</td>
										@else
											<td>
												Not Submitted
											</td>
										@endif
									</td>
								</tr>
							@endif
						@endforeach
					</table>
                <h3 class="bg-primary">Announcements</h3>
              </div>
          </div>
      </div>
  </div>
@endsection
