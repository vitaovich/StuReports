<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = array(
		'announcement',
		'instructor_id',
        'course_id',
	);
	
	public function course()
	{
		return $this->belongsTo('App\Course');
	}
	
	public function instructor()
	{
		return $this->belongsTo('App\Course', 'teacher_id');
	}
}
