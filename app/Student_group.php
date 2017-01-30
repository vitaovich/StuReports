<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_group extends Model
{
  public function project_group()
  {
    return $this->belongsTo('App\Project_group', 'Group_id');
  }

  public function user()
  {
      return $this->belongsTo('App\User', 'Student_id');
  }
}
