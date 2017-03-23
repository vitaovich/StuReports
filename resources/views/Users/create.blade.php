@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h1>Create User</h1></div>

            <div class="panel-body">
                {{ Form::open(['url' => '/users', 'class' => 'form-horizontal']) }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::label('name', 'Name:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                      {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {{ Form::label('email', 'Email:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                      {{ Form::email('email', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {{ Form::label('password', 'Password:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                      {{ Form::text('password', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                    {{ Form::label('student_id', 'Student ID:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                      {{ Form::text('student_id', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('role', 'Role:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                      {{ Form::select('role', ['Admin' => 'Admin', 'Instructor' => 'Instructor', 'Student' => 'Student']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
