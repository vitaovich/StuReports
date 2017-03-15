@extends('layouts.app')

@section('content')
  <link href="/css/reports.css" rel="stylesheet">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading"><h1 class="bg-primary">{{$user->name}} Reports</h1></div>
              <div class="panel-body">
				@if (Auth::check() && Auth::user()->isInstructor())
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
							</tr>
						@endfor
					</table>
				@else
					<p>Must Be Logged In As Instructor To View Reports</p>
				@endif
              </div>
          </div>
      </div>
  </div>
@endsection
