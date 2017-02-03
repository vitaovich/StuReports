<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = array(
		'course_id',
        'assignment_name',
        'open_assignment',
        'close_assignment',
	);
	
	public function course()
	{
		return $this->hasMany('App\Course', 'course_id');
	}
	
	public function submitted()
	{
		return $this->hasMany('App\Gradebook', 'assignment_id');
	}
}
