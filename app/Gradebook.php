<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradebook extends Model
{
    protected $table = 'gradebook';
	protected $fillable = array(
		'student_id',
        'assignment_id',
        'submitted',
        'grade',
	);
	
	public function assignments()
	{
		return $this->belongsTo('App\Assignment', 'assignment_id');
	}
	
	public function student()
	{
		return $this->belongsTo('App\User', 'student_id');
	}
}
