<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CSVController extends Controller
{
    public function handleFile(Request $request)
    {
        $file = $request->file('csv');
        if($file->getClientOriginalExtension() != 'csv')
            return view('Users.bad_file');
        $fin = fopen($file->getRealPath(),"r");
        $firstline = fgetcsv($fin);
        if($firstline[0] != 'student_id' || $firstline[1] != 'name' || $firstline[2] != 'email')
        {
            fclose($fin);
            return view('Users.bad_file');
        }
        $num = 0;
        while(($line = fgetcsv($fin)) !== FALSE)
        {
            //print_r($line);
            $num++;
            $user = new User;
            $user->name = $line[1];
            $user->email = $line[2];
            $user->password = bcrypt('password');
            $user->save();
        }

        fclose($fin);

        return view('Users.file_accepted', ['num' => $num]);
    }
}
