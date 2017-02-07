@extends('layouts.app')

@section('title', 'Import File')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading text-center">Import File</div>
              <div class="panel-body">
                  {{ Form::open(['url' => '/users/import', 'method' => 'put', 'files' => 'true']) }}
                  <div class="form-group row">
                      {{ Form::label('csv', 'Choose a file')}}
                      {{ Form::file('csv') }}
                  </div>
                  {{ Form::submit('Submit') }}
                  {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>
@endsection
