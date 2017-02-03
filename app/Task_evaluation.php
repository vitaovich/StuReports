<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_evaluation extends Model
{
	protected $fillable = array(
		'task_id',
        'individual_report_id',
		'concur',
        'comments',
	);
	
    public function taskEvaluated()
	{
		return $this->belongsTo('App\Task', 'task_id');
	}
	
	public function report()
	{
		return $this->belongsTo('App\IndividualReport', 'individual_report_id');
	}
}
