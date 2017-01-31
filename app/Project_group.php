<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_group extends Model
{
    public function classroom()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function students()
    {
      return $this->hasMany('App\User', 'group_id');
    }
    public function projects()
    {
        return $this->hasMany('App\Project_group', 'course_id');
    }
}
