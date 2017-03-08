<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\IndividualReportEmail;
use App\Mail\TeamReportEmail;
use App\User;
use App\Project_group;

class EmailsController extends Controller
{
    public function sendIndividual(Request $request)
    {
      $user = User::find($request->id);
      Mail::to($user->email)->send(new IndividualReportEmail($user));
    }

    public function sendTeam(Request $request)
    {
      $group = Project_group::find($request->id);
      $users = $group->students;
      foreach($users as $user)
        Mail::to($user->email)->send(new TeamReportEmail($user));
    }
}
