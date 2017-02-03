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
          <input type="textarea" name="easiest_understand" id="easiest_understand" required="true"/>
          <p>What was the hardest to understand?</p>
          <input type="textarea" name="hardest_understand" id="hardest_understand" required="true"/>
          <p>What was the easiest to approach?</p>
          <input type="textarea" name="easiest_approach" id="easiest_approach" required="true"/>
          <p>What was the hardest to approach?</p>
          <input type="textarea" name="hardest_approach" id="hardest_approach" required="true"/>
          <p>What was the easiest to solve?</p>
          <input type="textarea" name="easiest_solve" id="easiest_solve" required="true"/>
          <p>What was the hardest to solve?</p>
          <input type="textarea" name="hardest_solve" id="hardest_solve" required="true"/>
          <p>What was the easiest to evaluate?</p>
          <input type="textarea" name="easiest_evaluate" id="easiest_evaluate" required="true"/>
          <p>What was the hardest to evaluate?</p>
          <input type="textarea" name="hardest_evaluate" id="hardest_evaluate" required="true"/>
          <p>As a precentage, how far along are you in your project? Is this pace likely to succeed?</p>
          <input type="textarea" name="pace" id="pace" required="true"/>
          <p>Did you meet with your client this week? If not, when was the last time you met with your client?</p>
          <input type="textarea" name="client" id="client" required="true"/>
          <p>Are there any concerns about your project?</p>
          <input type="textarea" name="comments" id="comments" required="true"/>
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
