@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>
      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="/submit_individual_report">
           {!! csrf_field() !!}
          <table>
            <tr>
              <th>Day</th><th>Hours</th><th>On what?</th>
            </tr>
            <tr>
              <td>Saturday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="saturday_hours" name="saturday_hours"></td><td><input type="text" id="saturday_description" name="saturday_description"></td>
            </tr>
            <tr>
              <td>Sunday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="sunday_hours" name="sunday_hours"></td><td><input type="text" id="sunday_description" name="sunday_description"></td>
            </tr>
            <tr>
              <td>Monday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="monday_hours" name="monday_hours"></td><td><input type="text" id="monday_description" name="monday_description"></td>
            </tr>
            <tr>
              <td>Tuesday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="tuesday_hours" name="tuesday_hours"></td><td><input type="text" id="tuesday_description" name="tuesday_description"></td>
            </tr>
            <tr>
              <td>Wednesday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="wednesday_hours" name="wednesday_hours"></td><td><input type="text" id="wednesday_description" name="wednesday_description"></td>
            </tr>
            <tr>
              <td>Thursday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="thursday_hours" name="thursday_hours"></td><td><input type="text" id="thursday_description" name="thursday_description"></td>
            </tr>
            <tr>
              <td>Friday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="friday_hours" name="friday_hours"></td><td><input type="text" id="friday_description" name="friday_description"></td>
            </tr>
          </table>
          <br />
          <table>
            <tr>
              <th>Code</th><th>Title</th><th>Description</th>
            </tr>
            <tr>
              <td>temp1</td><td><input type="text" id="temp1_title"></td><td><input type="text" id="temp1-description"></td>
            </tr>
            <tr>
              <td>temp2</td><td><input type="text" id="temp2_title"></td><td><input type="text" id="temp2-description"></td>
            </tr>
            <tr>
              <td>temp3</td><td><input type="text" id="temp3_title"></td><td><input type="text" id="temp3-description"></td>
            </tr>
            <tr>
              <td>temp4</td><td><input type="text" id="temp4_title"></td><td><input type="text" id="temp4-description"></td>
            </tr>
            <tr>
              <td>temp5</td><td><input type="text" id="temp5_title"></td><td><input type="text" id="temp5-description"></td>
            </tr>
            <tr>
              <td>temp6</td><td><input type="text" id="temp6_title"></td><td><input type="text" id="temp6-description"></td>
            </tr>
          </table>
          <br />
          <p>Private Comments</p>
          <input type="text" name="Private_Comments" id="Private_Comments">
          <br>
          <input type="submit" value="Submit"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
