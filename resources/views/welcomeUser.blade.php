@extends('layouts.master')

@section('title', 'Success')

@section('sidebar')
    @parent
    <p>Welcome {{$fn}} {{$ln}}</p>
    <p>Email: {{$email}}</p>
    <p>Role: {{$role}}</p>
@endsection


@section('content')

  <div class="links">
    <a href="/users/create">Create User</a>
    <a href="/users/create">Create Class</a>
  </div>
@endsection
