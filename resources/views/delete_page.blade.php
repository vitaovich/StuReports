@extends('layouts.app')

@if ($thing == 'projectgroups')
  @section('title', 'Delete group')
@elseif ($thing == 'users')
  @section('title', 'Delete user')
@elseif ($thing == 'course')
  @section('title', 'Delete course');
@endif

@section('content')

@if($thing == 'users')
  <script>
    function goBack(thing) {
      location.href = "/users";
    }
  </script>
@else
  <script>
    function goBack(thing) {
      location.href = "/home";
    }
  </script>
@endif

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Delete
            @if ($thing == 'projectgroups')
              group
              <?php
                $group = App\Project_group::find($id);
                echo '"' . $group->project . '"';
               ?>
            @elseif ($thing == 'users')
              user
              <?php
                $user = App\User::find($id);
                echo '"' . $user->name . '"';
               ?>
            @elseif ($thing == 'course')
              course
              <?php
                $course = App\Course::find($id);
                echo '"' . $course->course_title . ' ' . $course->quarterString() . ' ' . $course->year . '"';
               ?>
            @endif
            </div>

            <div class="panel-body">
              <div class="container">
                {{ Form::open(['route' => [$thing . '.destroy', $id], 'method' => 'DELETE']) }}
                {{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}
                {{ Form::button('No', ['class' => 'btn btn-primary', 'onclick' => 'goBack()'])}}
                {{ Form::close() }}
              </div>
            </div>
        </div>
    </div>
</div>


@endsection
