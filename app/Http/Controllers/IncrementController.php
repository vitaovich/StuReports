<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Auth;

class IncrementController extends Controller
{
    public function increment_page()
    {
        if(Auth::check() && Auth::user()->isAdmin())
        {
            Artisan::call('sprint:increment');
            return view('increment_page');
        }
        else
          return view('no_permission');
    }
}
