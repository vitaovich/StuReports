<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskReport extends Model
{
  protected $table = 'task_reports';
  protected $fillable = array(
    'Individual_Report_id',
    'Latest_Progress',
    'Task_id',
    'Sprint',
    'Remaining_Sprints',
    'Reassigned',
  );

  public function task()
  {
    return $this->belongsTo('App\Task');
  }
}
