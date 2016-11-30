@extends('layouts.master')

@section('title', 'Login')

@section('content')
  <form method="POST" action="/login">
  {{ csrf_field() }}
    Username:
    <input type="users" name="username" id="username">
    Password:
    <input type="password" name="password" id="password">
    <button type="submit">Login</button>
  </form>
@endsection
