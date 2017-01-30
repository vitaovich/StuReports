<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isInstructor())
        {
          return view('Users.Instructor.index');
        }
        elseif (Auth::user()->isAdmin())
        {
          return redirect('home/admin');
        }
        else
        {
          return view('Users.Student.index');
        }
    }
}
