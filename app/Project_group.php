<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_group extends Model
{
	protected $fillable = array(
		'course_id',
		'project',
	);
	
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
	
	public function tasks()
	{
		return $this->hasMany('App\Task', 'group_id');
	}
	
	public function individualReports()
	{
		return $this->hasManyThrough('App\IndividualReport', 'App\User', 'group_id', 'student_id');
	}
}
