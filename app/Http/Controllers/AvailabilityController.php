<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class AvailabilityController extends Controller
{
    //currently works on one-week intervals with availability on Friday
    //TODO: make this work with other sprint lengths
    public function isAvailable()
    {
        $weekday = Carbon::today()->dayOfWeek;
        if($weekday == 6) //friday
          return true;
        else
          return false;
    }

    public function getTeam()
    {
      if($this->isAvailable() || !(Auth::check() && Auth::user()->isStudent())) //redirects to "not available" page for non-students
        return view('student_individual');
      else
        return view('reports_unavailable');
    }

    public function getIndividual()
    {
      if($this->isAvailable() || !(Auth::check() && Auth::user()->isStudent())) //redirects to "not available" page for non-students
        return view('student_team');
      else
        return view('reports_unavailable');
    }
}
