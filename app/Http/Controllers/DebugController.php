<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DebugController extends Controller
{
    public function debug_form()
    {
        return view('debug_form');
    }

    public function debug_submit(Request $request)
    {
        $on = $request->on;
        if($on == 1)
        {
            Artisan::call('sprint:debug');
        }
        else //$on == 0
        {
            Artisan::call('sprint:update');
        }

        return view('debug_submit', ['on' => $on]);
    }
}
