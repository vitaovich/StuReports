@extends('layouts.app')

@if ($thing == 'projectgroups')
  @section('title', 'Delete group')
@elseif ($thing == 'users')
  @section('title', 'Delete user')
@endif

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Delete
            @if ($thing == 'projectgroups')
              group
            @elseif ($thing == 'users')
              user
            @else
              {{ $thing }}
            @endif
            </div>

            <div class="panel-body">
              <div class="container">
                {{ Form::open(['route' => [$thing . '.destroy', $id], 'method' => 'DELETE']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
              </div>
            </div>
        </div>
    </div>
</div>


@endsection
