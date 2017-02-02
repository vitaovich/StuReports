<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskReport extends Model
{
  protected $table = 'task_reports';
  protected $fillable = array(
    'individual_report_id',
    'latest_progress',
    'task_id',
    'sprint',
    'remaining_sprints',
    'reassigned',
  );

  public function task()
  {
    return $this->belongsTo('App\Task', 'task_id');
  }
  
  public function reports()
  {
	  return $this->belongsTo('App\IndividualReport', 'individual_report_id');
  }
}
