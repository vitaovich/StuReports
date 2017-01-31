<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Task extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'tasks';

  protected $fillable = array(
    'description',
    'task_name',
    'student_id',
    'status',
    'group_id',
  );

  public function user()
  {
    return $this->belongsTo('App\User', 'id');
  }

  // this doesn't really work
  public static function getTasks($userID)
  {
    // $tasks = Task::where('Student_id', $userID)->get();//->where('Status', 'new')->orwhere('Status', 'continuing');
    $tasks = Task::getOngoingTasks()->where('student_id', '=', $userID);
    // return Task::where('Student_id', $userID);//->get();
    return $tasks;
  }

  public static function getOngoingTasks()
  {
    // return DB::table('tasks')->select('*')->where('Status', '=', 'new')->orWhere('Status', '=','continuing');
    return Task::orWhere('status', 'new')->orWhere('status','continuing')->get();

  }

  public function classrooms()
  {
      return $this->hasMany('App\TaskReport', 'task_id');
  }
}
