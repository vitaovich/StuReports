<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;

class AvailabilityController extends Controller
{
    public function isAvailable()
    {
        $course = Auth::user()->course();
        if($course == NULL)
            return false;

        $available = $course->reports_available;

        return $available == 1;
    }

    public function getTeam()
    {
        if($this->isAvailable() || !(Auth::check() && Auth::user()->isStudent())) //redirects to "not available" page for non-students
            return view('student_team');
        else
            return view('reports_unavailable');
    }

    public function getIndividual()
    {
        if($this->isAvailable() || !(Auth::check() && Auth::user()->isStudent())) //redirects to "not available" page for non-students
            return view('student_individual');
        else
            return view('reports_unavailable');
    }
}
