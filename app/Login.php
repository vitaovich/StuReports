<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
  public $timestamps = false;
  public $primaryKey = 'username';
}
