<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function course()
	{
		return $this->hasMany('App\Course', 'course_id');
	}
}
