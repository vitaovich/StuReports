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
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Course</th>
                      <th>Instructor</th>
                      <th><th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (Auth::user()->classrooms() as $classroom)
                      <tr>
                        <td>CSCD {{$classroom->Quarter}} {{$classroom->Year}}</td>
                        <td>Instructor: {{$classroom->instructor->name}}</td>
                        <td><a href="/course/{{$classroom->Class_id}}/edit" class="btn-sm btn-primary">Edit</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
            </div>
          </div>
      </div>
  </div>
@endsection
