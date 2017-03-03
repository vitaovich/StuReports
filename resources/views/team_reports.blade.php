@extends('layouts.app')

@section('content')
  <link href="/css/reports.css" rel="stylesheet">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading"><div class="panel-heading"><h1 class="bg-primary">{{$group->project}} Reports</h1></div></div>
              <div class="panel-body">
				@if (Auth::check() && Auth::user()->isInstructor())
					<table>
						<tr>
							<th>
								<b><u>Sprint</b></u>
							</th>
							<th>
								<b><u>Due
							</th>
							<th>
								<b><u>Review</b></u>
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
							<td>
								@if($report[0]->close_assignment <= $currentTime)
									<a href="/aggregated_report/group/{{$group->id}}/sprint/{{$report[0]->sprint}}">View</a>
								@else
									N/A
								@endif
							</td>
						</tr>
						@endforeach
					</table>
				@else
					<p>Must Be Logged In As Instructor To View Reports</p>
				@endif
              </div>
          </div>
      </div>
  </div>
@endsection
