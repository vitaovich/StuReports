@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Admin Home page
                <a class="btn-sm btn-primary" href="/course/create">Create Course</a>
              </div>
              <div class="container">
              <div class="panel-body">
                @if(Auth::user()->isAdmin())
                  @foreach (Auth::user()->classrooms() as $classroom)
                  <div class="row margin-top">
                    <div class="col-md-3">CSCD {{$classroom->Quarter}} {{$classroom->Year}}</div>
                    <div class="col-md-3">Instructor: {{$classroom->instructor->name}}</div>
                    <div class="col-md-6"><a href="/course/{{$classroom->Class_id}}/edit" class="btn-sm btn-primary">Edit</a></div>
                  </div>
                </br>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
      </div>
  </div>
@endsection
