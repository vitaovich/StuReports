<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use APP\User;
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
          return redirect('home/instructor');
        }
        elseif (Auth::user()->isAdmin())
        {
          return redirect('home/admin');
        }
        else
        {
		  $report_assignments = Course::findOrFail(Auth::user()->course_id)->assignments->where('sprint', '!=', null)->sortBy('code')->groupBy('sprint');
		  $course_assignments = Course::findOrFail(Auth::user()->course_id)->assignments->where('sprint', '==', null)->sortBy('close_assignment');
		  $submitted = User::findOrFail(Auth::user()->id)->assignments;
          return view('Home.Student.index', compact('report_assignments','submitted', 'course_assignments'));
        }
    }
}
