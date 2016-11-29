@extends('layouts.master')

@section('content')
     <form method="POST" action="/submit_individual_report">
       {!! csrf_field() !!}
      <table>
        <tr>
          <th>Day</th><th>Hours</th><th>On what?</th>
        </tr>
        <tr>
          <td>Saturday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="saturday-hours"></td><td><input type="text" id="saturday-title"></td>
        </tr>
        <tr>
          <td>Sunday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="sunday-hours"></td><td><input type="text" id="sunday-title"></td>
        </tr>
        <tr>
          <td>Monday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="monday-hours"></td><td><input type="text" id="monday-title"></td>
        </tr>
        <tr>
          <td>Tuesday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="tuesday-hours"></td><td><input type="text" id="tuesday-title"></td>
        </tr>
        <tr>
          <td>Wednesday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="wednesday-hours"></td><td><input type="text" id="wednesday-title"></td>
        </tr>
        <tr>
          <td>Thursday</td><td><input type="number"  min="0"  max="24" step="0.225" value="0" id="thursday-hours"></td><td><input type="text" id="thursday-title"></td>
        </tr>
        <tr>
          <td>Friday</td><td><input type="number"  min="0"  max="24" step="0.25" value="0" id="friday-hours"></td><td><input type="text" id="friday-title"></td>
        </tr>
      </table>
      <br />
      <table>
        <tr>
          <th>Code</th><th>Title</th><th>Description</th>
        </tr>
        <tr>
          <td>temp1</td><td><input type="text" id="temp1-title"></td><td><input type="text" id="temp1-description"></td>
        </tr>
        <tr>
          <td>temp2</td><td><input type="text" id="temp2-title"></td><td><input type="text" id="temp2-description"></td>
        </tr>
        <tr>
          <td>temp3</td><td><input type="text" id="temp3-title"></td><td><input type="text" id="temp3-description"></td>
        </tr>
        <tr>
          <td>temp4</td><td><input type="text" id="temp4-title"></td><td><input type="text" id="temp4-description"></td>
        </tr>
        <tr>
          <td>temp5</td><td><input type="text" id="temp5-title"></td><td><input type="text" id="temp5-description"></td>
        </tr>
        <tr>
          <td>temp6</td><td><input type="text" id="temp6-title"></td><td><input type="text" id="temp6-description"></td>
        </tr>
      </table>
      <br />
      <input type="submit" value="Submit"/>
    </form>
@endsection
