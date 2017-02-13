@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit User</div>

            <div class="panel-body">
              <div class="container">
              {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) }}
              <div class="form-group row">
                  {{ Form::label('name', 'Name') }}
                  {{ Form::text('name') }}
              </div>
              <div class="form-group row">
                  {{ Form::label('email', 'Email') }}
                  {{ Form::email('email') }}
              </div>
              <div class="form-group row">
                  {{ Form::label('role', 'Role') }}
                  {{ Form::select('role', ['Admin' => 'Admin', 'Instructor' => 'Instructor', 'Student' => 'Student']) }}
              </div>
              {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            </div>
          </div>
        </div>
    </div>
</div>


@endsection
