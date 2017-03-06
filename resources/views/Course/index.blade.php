@extends('layouts.app')

@section('title', 'Courses')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading"><h1>Course page</h1>
              </div>
              <div class="panel-body">
                @if(Auth::user()->isInstructor())
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Course</th>
                      <th>Instructor</th>
                      <th>Active</th>
                      <th><a class="btn-sm btn-success" href="/course/create">Create Course</a></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (Auth::user()->courses() as $course)
                      <tr>
                        <td>{{$course->course_title }} {{ $course->quarterString() }} {{ $course->year }}</td>
                        <td>{{ $course->instructor->name }}</td>
                        <td>
                          @if ( $course->active === 1)
                            Enabled
                          @else
                            Disabled
                          @endif
                        </td>
                        <td>
                          <a href="/course/{{$course->id}}/edit" class="btn-sm btn-primary">Edit</a>
                          <a class="btn-sm btn-danger" href="">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
            </div>
          </div>
      </div>
  </div>
@endsection
