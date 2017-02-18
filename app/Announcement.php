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
}
