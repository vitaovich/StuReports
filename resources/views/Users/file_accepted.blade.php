@extends('layouts.app')

@section('title', 'File Accepted')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-body">
                  File accepted! {{ $numAdded }} users added.
                  @if($numDupEmails != 0)
                      {{ $numDupEmails }} users were not added due to duplicate email addresses.
                  @endif
              </div>
          </div>
      </div>
  </div>
@endsection
