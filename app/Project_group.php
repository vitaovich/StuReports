<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_group extends Model
{
    protected $primaryKey = 'Group_id';

    public function classroom()
    {
        return $this->belongsTo('App\Classroom', 'Class_id');
    }

    public function student_group()
    {
      return $this->hasMany('App\Student_group', 'Group_id');
    }
    public function projects()
    {
        return $this->hasMany('App\Project_group', 'Class_id');
    }
}
