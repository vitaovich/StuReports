<?php
use App\TeamReport;
 ?>
@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
    <div class="panel-heading"><h1>Team Report</h1></div>
      <div class="panel-body">
        @if(TeamReport::hasSubmitted(Auth::user()->group_id, Auth::user()->course()->sprint) == true)
        <p>A member of your team has already submitted the team report for this sprint.</p>
        @elseif (Auth::check() && Auth::user()->isStudent())
        <form class="form-horizontal" method="POST" action="/submit_team_report">
          {!! csrf_field() !!}
          <p>What was the easiest to understand?</p>
          <textarea class="teamReportAnswer" rows="5" name="easiest_understand" id="easiest_understand" required="true"></textarea>
          <p>What was the hardest to understand?</p>
          <textarea class="teamReportAnswer" rows="5" name="hardest_understand" id="hardest_understand" required="true"></textarea>
          <p>What was the easiest to approach?</p>
          <textarea class="teamReportAnswer" rows="5" name="easiest_approach" id="easiest_approach" required="true"></textarea>
          <p>What was the hardest to approach?</p>
          <textarea class="teamReportAnswer" rows="5" name="hardest_approach" id="hardest_approach" required="true"></textarea>
          <p>What was the easiest to solve?</p>
          <textarea class="teamReportAnswer" rows="5" name="easiest_solve" id="easiest_solve" required="true"></textarea>
          <p>What was the hardest to solve?</p>
          <textarea class="teamReportAnswer" rows="5" name="hardest_solve" id="hardest_solve" required="true"></textarea>
          <p>What was the easiest to evaluate?</p>
          <textarea class="teamReportAnswer" rows="5" name="easiest_evaluate" id="easiest_evaluate" required="true"></textarea>
          <p>What was the hardest to evaluate?</p>
          <textarea class="teamReportAnswer" rows="5" name="hardest_evaluate" id="hardest_evaluate" required="true"></textarea>
          <p>As a precentage, how far along are you in your project? Is this pace likely to succeed?</p>
          <textarea class="teamReportAnswer" rows="5" name="pace" id="pace" required="true"></textarea>
          <p>Did you meet with your client this week? If not, when was the last time you met with your client?</p>
          <textarea class="teamReportAnswer" rows="5" name="client" id="client" required="true"></textarea>
          <p>Are there any concerns about your project?</p>
          <textarea class="teamReportAnswer" rows="5" name="comments" id="comments" required="true"></textarea>
          <br />
          <input type="submit" value="Submit"/>
        </form>
        @else
          <p>You must be logged in as a student to submit a report</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
