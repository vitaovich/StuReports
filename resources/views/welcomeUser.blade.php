@extends('layouts.master')

@section('title', 'Success')

@section('sidebar')
    @parent

    <a href="/api/users">Create User</a>
@endsection


@section('content')
  <div class="title m-b-md">
      Welcome {{$fn}} {{$ln}}
  </div>

  <div class="links">
      <p>Email: {{$email}}</p>
      <p>Role: {{$role}}</p>
  </div>
@endsection
