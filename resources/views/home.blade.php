@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Dashboard</div>

              <div class="panel-body">
                @if (Auth::check() && Auth::user()->isInstructor())
                  {{ $projects = App\Classroom::with('projects')->where('Teacher_id', Auth::user()->id)->get() }}
                  @foreach ($projects as $project)
                  <p>{{$project->Project}}</p>
                  @endforeach
                @endif
              </div>
          </div>
      </div>
  </div>
@endsection
