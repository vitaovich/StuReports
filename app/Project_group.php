<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_group extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function students()
    {
      return $this->hasMany('App\User', 'group_id');
    }
	
	public function teamReports()
	{
		return $this->hasMany('App\TeamReport', 'group_id');
	}
}
