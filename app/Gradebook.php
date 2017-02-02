<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradebook extends Model
{
    protected $table = 'gradebook';
	
	public function assignments()
	{
		return $this->hasMany('App\Assignment', 'assignment_id');
	}
	
	public function students()
	{
		return $this->hasMany('App\User', 'student_id');
	}
}
