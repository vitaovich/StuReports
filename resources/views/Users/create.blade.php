@extends('layouts.master')

@section('title', 'Login')

@section('sidebar')
  <form method="POST" action="/api/users">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div>    User ID:
      <input type="number" name="user_id" id="user_id">
  </div>
  <div>
    First Name:
    <input type="text" name="first_name" id="first_name">
  </div>
  <div>
    Last Name:
    <input type="text" name="last_name" id="last_name">
  </div>
  <div>
    Role:
    <select name="role">
      <option value="admin">Admin</option>
      <option value="professor">Professor</option>
      <option value="student">Student</option>
    </select>
  </div>
  <div>
    Email:
    <input type="email" name="email" id="email">
  </div>
  <div>
    <button type="submit">Create</button>
  </div>
  </form>
@endsection
