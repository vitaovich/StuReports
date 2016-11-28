<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDO;

class UsersController extends Controller
{
    public function getUsers()
    {
      $db = DB::connection('mysql');

      $stmt = $db->getPdo()->prepare("CALL sel_Users");

      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser($id)
    {
      $db = DB::connection('mysql');

      $stmt = $db->getPdo()->prepare("CALL sel_User(?)");

      $stmt->bindParam(1, $id);

      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loginUser(Request $request)
    {
      //custom DB call to simulate eastern sign on (WARNING: doesn't use stored procedure)
      $db = DB::connection('mysql');
      $username = $request->input('username');
      $stmt = $db->getPdo()->prepare("SELECT user_id FROM logins WHERE username = ?");
      $stmt->bindParam(1, $username);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //Get value from user_id column and call Web Api to '{$url}/api/users/{$id}'
      $id = $results[0]['user_id'];
      $url = env('APP_URL', 'http://localhost');
      $user = json_decode(file_get_contents($url . "/api/users/" . $id), TRUE);

      //Pass values from web api to view file 'resources/views/welcomeUser.blade.php'
      return view('welcomeUser', ['fn' => $user[0]['First_Name'],
                              'ln' => $user[0]['Last_Name'],
                              'role' => $user[0]['Role'],
                              'email' => $user[0]['email']]);
    }
}
