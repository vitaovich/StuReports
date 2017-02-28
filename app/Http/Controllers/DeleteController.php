<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function handle(Request $request)
    {
      $id = $request->get('id');
      $thing = $request->get('thing');
      return view('delete_page', ['id' => $id, 'thing' => $thing]);
    }
}
