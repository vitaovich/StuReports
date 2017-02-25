@extends('layouts.app')

@section('title', 'Delete group')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit a group</div>

            <div class="panel-body">
              <div class="container">
              {{ Form::open(['route' => ['projectgroups.destroy', $id], 'method' => 'DELETE']) }}
              {{ Form::submit('Delete', ['class' => 'btn btn-primary']) }}
            </div>
          </div>
        </div>
    </div>
</div>


@endsection
