@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>
      <div class="panel-body">
        @if (Auth::check() && Auth::user()->isStudent())
        <form class="form-horizontal" method="POST" action="/submit_team_report">
          {!! csrf_field() !!}
          <p>What was the easiest to understand?</p>
          <input type="textarea" name="Easiest_Understand" id="Easiest_Understand" required="true"/>
          <p>What was the hardest to understand?</p>
          <input type="textarea" name="Hardest_Understand" id="Hardest_Understand" required="true"/>
          <p>What was the easiest to approach?</p>
          <input type="textarea" name="Easiest_Approach" id="Easiest_Approach" required="true"/>
          <p>What was the hardest to approach?</p>
          <input type="textarea" name="Hardest_Approach" id="Hardest_Approach" required="true"/>
          <p>What was the easiest to solve?</p>
          <input type="textarea" name="Easiest_Solve" id="Easiest_Solve" required="true"/>
          <p>What was the hardest to solve?</p>
          <input type="textarea" name="Hardest_Solve" id="Hardest_Solve" required="true"/>
          <p>What was the easiest to evaluate?</p>
          <input type="textarea" name="Easiest_Evaluate" id="Easiest_Evaluate" required="true"/>
          <p>What was the hardest to evaluate?</p>
          <input type="textarea" name="Hardest_Evaluate" id="Hardest_Evaluate" required="true"/>
          <p>As a precentage, how far along are you in your project? Is this pace likely to succeed?</p>
          <input type="textarea" name="Pace" id="Pace" required="true"/>
          <p>Did you meet with your client this week? If not, when was the last time you met with your client?</p>
          <input type="textarea" name="Client" id="Client" required="true"/>
          <p>Are there any concerns about your project?</p>
          <input type="textarea" name="Comments" id="Comments" required="true"/>
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
