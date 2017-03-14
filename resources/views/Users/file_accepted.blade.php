@extends('layouts.app')

@section('title', 'File Accepted')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-body">
                  File accepted! {{ $numAdded }} users added.
                  @if($numDupIDs != 0)
                      {{ $numDupIDs }} users were not added due to duplicate student IDs.
                  @endif
              </div>
          </div>
      </div>
  </div>
@endsection
