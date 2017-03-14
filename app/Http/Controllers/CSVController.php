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
        $numAdded = 0;
        $numDupIDs = 0;
        while(($line = fgetcsv($fin)) !== FALSE)
        {
            //print_r($line);
            $user = new User;
            $user->name = $line[0];
            $user->student_id = $line[1];
            $user->group_id = 1;
            $user->course_id = $request->get('course_id');
            if(User::where('student_id', '=', $user->student_id)->count() == 0) //no record with same email; email is unique
            {
                $user->save();
                $numAdded++;
            }
            else
                $numDupIDs++;
        }

        fclose($fin);

        return view('Users.file_accepted', ['numAdded' => $numAdded, 'numDupIDs' => $numDupIDs]);
    }
}
