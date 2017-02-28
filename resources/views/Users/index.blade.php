@extends('layouts.app')

@section('title', 'Users')

@section('content')
<script>
  function sendDelete(id) {
    document.getElementById('delete_form').id.value = id;
    document.getElementById('delete_form').submit();
  }
</script>

<form id='delete_form' action="/delete" method="POST">
  {{ csrf_field() }}
  <input type="hidden" name="thing" value="users">
  <input type="hidden" name="id" value="-1">

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
                        <td>{{$user->role}}</td>
                        <td><a class="btn-sm btn-primary" href="/users/{{$user->id}}/edit">Edit</a></td>
                        <td><a class="btn-sm btn-danger" href="javascript:sendDelete({{$user->id}})">Delete</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</form>
@endsection
