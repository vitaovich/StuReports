@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
      <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
          @if (Auth::check() && Auth::user()->isStudent())
          <form class="form-horizontal" method="POST" action="/submit_individual_report">
             {!! csrf_field() !!}
            <table>
              <tr>
                <th>Day</th><th>Hours</th><th>On what?</th>
              </tr>
              <tr>
                <td>Saturday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="saturday_hours" name="saturday_hours"></td><td><input type="text" class="timeLogDescription" id="saturday_description" name="saturday_description"></td>
              </tr>
              <tr>
                <td>Sunday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="sunday_hours" name="sunday_hours"></td><td><input type="text" class="timeLogDescription" id="sunday_description" name="sunday_description"></td>
              </tr>
              <tr>
                <td>Monday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="monday_hours" name="monday_hours"></td><td><input type="text" class="timeLogDescription" id="monday_description" name="monday_description"></td>
              </tr>
              <tr>
                <td>Tuesday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="tuesday_hours" name="tuesday_hours"></td><td><input type="text" class="timeLogDescription" id="tuesday_description" name="tuesday_description"></td>
              </tr>
              <tr>
                <td>Wednesday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="wednesday_hours" name="wednesday_hours"></td><td><input type="text" class="timeLogDescription" id="wednesday_description" name="wednesday_description"></td>
              </tr>
              <tr>
                <td>Thursday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="thursday_hours" name="thursday_hours"></td><td><input type="text" class="timeLogDescription" id="thursday_description" name="thursday_description"></td>
              </tr>
              <tr>
                <td>Friday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="friday_hours" name="friday_hours"></td><td><input type="text" class="timeLogDescription" id="friday_description" name="friday_description"></td>
              </tr>
            </table>
            <br />
            <table id="activitiesTable">
              <tr>
               <th>Title</th><th>Description</th>
              </tr>
              <tr id="rowID1">
                <td><input type="text" name="newActivityName[]" class="newActivityTitleClass"></td><td><input type="text" name="newActivityDescription[]" class="newActivityDescriptionClass"</td>  </tr>
              <tr id="rowID2">
                <td><input type="text" name="newActivityName[]" class="newActivityTitleClass"></td><td><input type="text" name="newActivityDescription[]" class="newActivityDescriptionClass"</td>
              </tr>
              <tr id="rowID3">
                <td><input type="text" name="newActivityName[]" class="newActivityTitleClass"></td><td><input type="text" name="newActivityDescription[]" class="newActivityDescriptionClass"</td>
              </tr>
              <tr id="rowID4">
                <td><input type="text" name="newActivityName[]" class="newActivityTitleClass"></td><td><input type="text" name="newActivityDescription[]" class="newActivityDescriptionClass"</td>
              </tr>
              <tr id="rowID5">
                <td><input type="text" name="newActivityName[]" class="newActivityTitleClass"></td><td><input type="text" name="newActivityDescription[]" class="newActivityDescriptionClass"</td>
              </tr>
              <tr id="rowID6">
                <td><input type="text" name="newActivityName[]" class="newActivityTitleClass"></td><td><input type="text" name="newActivityDescription[]" class="newActivityDescriptionClass"</td>
              </tr>
            </table>
            <script type="text/javascript" src="{!! asset('js/NewActivity.js') !!}"></script>
            <br />
            <p>Private Comments</p>
            <input type="text" name="Private_Comments" id="Private_Comments">
            <br>
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
