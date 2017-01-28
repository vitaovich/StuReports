<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


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

  // this doesn't really work
  public static function getTasks($userID)
  {
    // $tasks = Task::where('Student_id', $userID)->get();//->where('Status', 'new')->orwhere('Status', 'continuing');
    // $tasks = Task::getOngoingTasks()->where('Student_id', '=', $userID);
    return Task::where('Student_id', $userID)->get();
  }

  public static function getOngoingTasks()
  {
    // return DB::table('tasks')->select('*')->where('Status', '=', 'new')->orWhere('Status', '=','continuing');
    return Task::where('Status', '=', 'new')->orWhere('Status', '=','continuing');

  }

  public function classrooms()
  {
      return $this->hasMany('App\TaskReport', 'Task_id');
  }
}
