@extends('layouts.master')

@section('content')
  <form method="POST" action="/submit_team_report">
  {!! csrf_field() !!}
  <p>What was the hardest to understand?</p>
  <input type="textarea" id="hardest_understand" required="true"/>
  <p>What was the easiest to approach?</p>
  <input type="textarea" id="easiest_approach" required="true"/>
  <p>What was the hardest to approach?</p>
  <input type="textarea" id="hardest_approach" required="true"/>
  <p>What was the easiest to solve?</p>
  <input type="textarea" id="easiest_solve" required="true"/>
  <p>What was the hardest to solve?</p>
  <input type="textarea" id="hardest_solve" required="true"/>
  <p>What was the easiest to evaluate?</p>
  <input type="textarea" id="easiest_evaluate" required="true"/>
  <p>What was the hardest to evaluate?</p>
  <input type="textarea" id="hardest_evaluate" required="true"/>
  <p>As a precentage, how far along are you in your project? Is this pace likely to succeed?</p>
  <input type="textarea" id="far_along" required="true"/>
  <p>Did you meet with your client this week? If not, when was the last time you met with your client?</p>
  <input type="textarea" id="client_meeting" required="true"/>
  <p>Are there any concerns about your project?</p>
  <input type="textarea" id="concerns" required="true"/>
  <br />
  <input type="submit" value="Submit"/>
@endsection
