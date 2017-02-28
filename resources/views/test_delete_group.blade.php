@extends('layouts.app')

@section('title', 'Delete group')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Delete
            @if ($thing == 'projectgroups')
              group
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
