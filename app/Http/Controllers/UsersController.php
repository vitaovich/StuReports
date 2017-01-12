<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Login;
use PDO;

class UsersController extends Controller
{
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

    public function loginUser(Request $request)
    {
      $login = Login::findOrFail($request->username);
      $url = env('APP_URL', 'http://localhost');
      $user = json_decode(file_get_contents($url . "/api/users/" . $login->user_id), TRUE);

      if($user['Role'] == 'student')
      {
        return view('welcomeStudent', ['fn' => $user['First_Name'],
                                'ln' => $user['Last_Name'],
                                'role' => $user['Role'],
                                'email' => $user['email']]);
      }
      //Pass values from web api to view file 'resources/views/welcomeUser.blade.php'
      return view('welcomeProfessor', ['fn' => $user['First_Name'],
                              'ln' => $user['Last_Name'],
                              'role' => $user['Role'],
                              'email' => $user['email']]);
    }
}
