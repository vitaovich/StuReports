<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $primaryKey = 'Task_id';
  protected $table = 'tasks';

  protected $fillable = array(
    'Description',
    'Task_name',
    'Student_id',
    'Status',
    'Group_id',
  );

  public function user()
  {
    return $this->belongsTo('App\User', 'id');
  }

  public static function getTasks($userID)
  {
    $tasks = Task::where('Student_id', $userID);
    return $tasks;
  }
}
