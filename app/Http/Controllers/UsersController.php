<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Login;
use Auth;
use PDO;

class UsersController extends Controller
{
    public function index()
    {
      //return view('Users.index', ['users' => $this->getUsers()]);
      if(!(Auth::user()->isInstructor() || Auth::user()->isAdmin()))
          return view('no_permission');
      else
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
      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
      ]);

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->role = $request->role;

      $user->save();
      return view('home');
    }
}
