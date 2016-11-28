@extends('layouts.master')
<!--
@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection -->

@section('content')
  <form method="POST" action="/login">
  {!! csrf_field() !!}

  <div>
      Username:
      <input type="users" name="username" id="username">
  </div>

  <div>
      Password:
      <input type="password" name="password" id="password">
  </div>
  <div>
      <button type="submit">Login</button>
  </div>
  </form>

@endsection
