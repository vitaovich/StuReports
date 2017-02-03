<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member_evaluation extends Model
{
	protected $fillable = array(
		'student_id',
        'individual_report_id',
		'concur_hours',
        'performing',
        'comments',
	);
	
    public function report()
	{
		return $this->belongsTo('App\IndividualReport', 'individual_report_id');
	}
	
	public function memberEvaluated()
	{
		return $this->belongsTo('App\User', 'student_id');
	}
}
