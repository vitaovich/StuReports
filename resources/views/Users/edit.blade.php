@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit User</div>

            <div class="panel-body">
              <div class="container">
              {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'class' =>'form-horizontal']) }}
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {{ Form::label('name', 'Name:', ['class' => 'col-md-3 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                  </div>
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  {{ Form::label('email', 'Email:', ['class' => 'col-md-3 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                  </div>
              </div>
              <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                  {{ Form::label('student_id', 'Student ID:', ['class' => 'col-md-3 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::text('student_id', null, ['class' => 'form-control']) }}
                  </div>
              </div>
              <div class="form-group">
                  {{ Form::label('role', 'Role:', ['class' => 'col-md-3 control-label']) }}
                  <div class="col-md-6">
                    {{ Form::select('role', ['Admin' => 'Admin', 'Instructor' => 'Instructor', 'Student' => 'Student']) }}
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>


@endsection
