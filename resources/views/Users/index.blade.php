@extends('layouts.app')

@section('title', 'Users')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading text-center">Users</div>
              <div class="panel-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->Role}}</td>
                        <td><a class="btn-sm btn-primary" href="/users/edit/{{$user->id}}">Edit</a></td>
                        <td><a class="btn-sm btn-danger" href="/users/delete/{{$user->id}}">Delete</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
@endsection
