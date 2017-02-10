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
        $numAdded = 0;
        $numDupEmails = 0;
        while(($line = fgetcsv($fin)) !== FALSE)
        {
            //print_r($line);
            $user = new User;
            $user->name = $line[1];
            $user->email = $line[2];
            $user->password = bcrypt('password');
            if(User::where('email', '=', $user->email)->count() == 0) //no record with same email; email is unique
            {
                $user->save();
                $numAdded++;
            }
            else
                $numDupEmails++;
        }

        fclose($fin);

        return view('Users.file_accepted', ['numAdded' => $numAdded, 'numDupEmails' => $numDupEmails]);
    }
}
