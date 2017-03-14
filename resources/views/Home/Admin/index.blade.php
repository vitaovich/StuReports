@extends('layouts.app')

@section('title', 'Home')

@section('content')
<script>
  function sendDelete(id) {
    document.getElementById('delete_form').id.value = id;
    document.getElementById('delete_form').submit();
  }
</script>

<form id='delete_form' action="/delete" method="POST">
  {{ csrf_field() }}
  <input type="hidden" name="thing" value="course">
  <input type="hidden" name="id" value="-1">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading"><h1>Admin Home page</h1>
              </div>
              <div class="panel-body">
                @if(Auth::user()->isAdmin())
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Course</th>
                      <th>Instructor</th>
                      <th><a class="btn-sm btn-success" href="/course/create">Create Course</a></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (Auth::user()->courses() as $course)
                      <tr>
                        <td>{{$course->course_title }} {{ $course->quarterString() }} {{ $course->year }}</td>
                        <td>{{ $course->instructor->name }}</td>
                        <td>
                          <a href="/course/{{$course->id}}/edit" class="btn-sm btn-primary">Edit</a>
                          <a class="btn-sm btn-danger" href="javascript:sendDelete({{ $course->id }})">Delete</a>
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
</form>
@endsection
