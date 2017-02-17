@extends('layouts.app')

@section('title', 'Debug Mode')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading text-center">Debug Mode</div>
              <div class="panel-body">
                  Debug mode
                  @if($on == 1)
                  activated.
                  @else
                  deactivated.
                  @endif
              </div>
          </div>
      </div>
  </div>
@endsection
