<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamReport;

class ReportsController extends Controller
{
  public function putTeamReport(Request $request)
  {
    $teamReport = new TeamReport;
    $teamReport->Easiest_Understand = $request->Easiest_Understand;
    $teamReport->Hardest_Understand = $request->Hardest_Understand;
    $teamReport->Easiest_Approach = $request->Easiest_Approach;
    $teamReport->Hardest_Approach = $request->Hardest_Approach;
    $teamReport->Easiest_Solve = $request->Easiest_Solve;
    $teamReport->Hardest_Solve = $request->Hardest_Solve;
    $teamReport->Easiest_Evaluate = $request->Easiest_Evaluate;
    $teamReport->Hardest_Evaluate = $request->Hardest_Evaluate;
    $teamReport->Pace = $request->Pace;
    $teamReport->Client = $request->Client;
    $teamReport->Comments = $request->Comments;
    // the following two lines contain dummy data that needs to be changed
    $teamReport->Sprint = 0;
    $teamReport->Group_id = 1;
    $teamReport->save();
    return view('home');
    // return $request->Easiest_Understand;
  }

  public function getTeamReports()
  {
    $reports = TeamReport::all();
    return $reports;
  }
}
