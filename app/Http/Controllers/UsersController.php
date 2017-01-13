<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Login;
use PDO;

class UsersController extends Controller
{
    public function index()
    {
      return view('Users.index', ['users' => $this->getUsers()]);
    }

    public function getUsers()
    {
      $users = User::all();
      return $users;
    }

    public function getUser($id)
    {
      $user = User::findOrFail($id);
      return $user;
    }

    public function putUser(Request $request)
    {
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->Role = $request->role;

      $user->save();
      return view('home');
    }
}
