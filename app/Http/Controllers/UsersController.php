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
      // $db = DB::connection('mysql');
      //
      // $stmt = $db->getPdo()->prepare("CALL sel_Users");
      //
      // $stmt->execute();
      // return $stmt->fetchAll(PDO::FETCH_ASSOC);
      $users = User::all();
      return $users[0]->First_Name;
    }

    public function getUser($id)
    {
      // $db = DB::connection('mysql');
      //
      // $stmt = $db->getPdo()->prepare("CALL sel_User(?)");
      //
      // $stmt->bindParam(1, $id);
      //
      // $stmt->execute();
      // return $stmt->fetchAll(PDO::FETCH_ASSOC);
      $user = User::findOrFail($id);
      return $user;
    }

    public function putUser(Request $request)
    {
      $user = new User;
      $user->User_ID = $request->user_id;
      $user->First_Name = $request->first_name;
      $user->Last_Name = $request->last_name;
      $user->Role = $request->role;
      $user->email = $request->email;

      $user->save();
      return view('welcome');
    }

    public function loginUser(Request $request)
    {
      // //custom DB call to simulate eastern sign on (WARNING: doesn't use stored procedure)
      // $db = DB::connection('mysql');
      // $username = $request->input('username');
      // $stmt = $db->getPdo()->prepare("SELECT user_id FROM logins WHERE username = ?");
      // $stmt->bindParam(1, $username);
      // $stmt->execute();
      // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //
      // //Get value from user_id column and call Web Api to '{$url}/api/users/{$id}'
      // $id = $results[0]['user_id'];

      $login = Login::findOrFail($request->username);
      $url = env('APP_URL', 'http://localhost');
      $user = json_decode(file_get_contents($url . "/api/users/" . $login->user_id), TRUE);

      //Pass values from web api to view file 'resources/views/welcomeUser.blade.php'
      return view('welcomeUser', ['fn' => $user['First_Name'],
                              'ln' => $user['Last_Name'],
                              'role' => $user['Role'],
                              'email' => $user['email']]);
    }
}
