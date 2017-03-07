<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailsController extends Controller
{
    public function sendIndividual(User $user)
    {
      Mail::to($user->email)->send(new IndividualReportEmail($user));
    }

    public function sendTeam(User $user)
    {
      Mail::to($user->email)->send(new TeamReportEmail($user));
    }
}
