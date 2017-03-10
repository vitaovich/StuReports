<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Announcement;
use App\Project_group;
use App\IndividualReport;
use Auth;
use Carbon\carbon;

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
		  $course = Course::findOrFail(Auth::user()->course_id);
		  $group = Project_group::findOrFail(Auth::user()->group_id);
		  $instructor = User::findOrFail($course->teacher_id);
		  $currentTime = Carbon::now();
          return view('Home.Student.index', compact('currentTime', 'course', 'instructor', 'group'));
        }
    }
}
