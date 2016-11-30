@extends('layouts.master')

@section('title', 'Create class')

@section('content')
  <form method="POST" action="/api/classes">
  <div>
    Professor:
      <input type="text" name="user_id" id="user_id">
  </div>
  <div>
    Year:
    <input type="number" name="year" id="year">
  </div>
  <div>
    Quarter:
    <select name="role">
      <option value="fall">Fall</option>
      <option value="winter">Winter</option>
      <option value="spring">Spring</option>
      <option value="summer">Summer</option>
    </select>
  </div>
  <div>
    Course Number:
    <input type="number" name="course_number" id="course_number">
  </div>
  <div>
    Sprint Length:
    <input type="number" name="sprint_length" id="sprint_length">
  </div>
  <div>
    <button type="submit">Create</button>
  </div>
  </form>
@endsection
