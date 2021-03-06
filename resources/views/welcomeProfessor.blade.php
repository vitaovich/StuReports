@extends('layouts.app')

@section('title', 'Success')

@section('sidebar')
    @parent
    <p>Welcome {{$fn}} {{$ln}}</p>
    <p>Email: {{$email}}</p>
    <p>Role: {{$role}}</p>

    <div class="links">
      <a href="/">Logout</a>
    </div>
@endsection


@section('content')

  <div class="links">
    <a href="/users/create">Create User</a>
    <a href="/classes/create">Create Class</a>
  </div>
@endsection
