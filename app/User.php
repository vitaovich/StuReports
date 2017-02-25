<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password', 'role', 'group_id', 'course_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  public function isAdmin()
  {
    return $this->role == 'Admin';
  }

  public function isInstructor()
  {
    return $this->role == 'Instructor';
  }

  public function course()
  {
      return Course::find($this->course_id);
  }

  public function courses()
  {
      return Course::orderBy('year','desc')->orderBy('quarter', 'desc')->get();
  }

  public function isStudent()
  {
    return $this->role == 'Student';
  }

  public function group()
  {
    return $this->belongsTo('App\Project_group');
  }

  public function tasks()
  {
    return $this->hasMany('App\Task', 'student_id');
  }

	public function taskReports()
	{
		return $this->hasManyThrough('App\TaskReport', 'App\Task', 'student_id', 'task_id');
	}

	public function individualReports()
	{
		return $this->hasMany('App\individualReport', 'student_id');
	}

	public function evaluations()
	{
		return $this->hasMany('App\Member_evaluation');
	}

	public function assignments()
	{
		return $this->hasMany('App\Gradebook', 'student_id');
	}

  public static function getGroupmates($userGroupID) // need to account for multiple classes
  {
    // This class doesn't extend model, meaning I can't use some of the query builder
    // tools provided by Laravel (such as orWhere) so the view has to (inelegantly) take care
    // of filtering out the current user from this collection.
    return User::where('group_id', '=', $userGroupID)->get();
    // return User::where('group_id', '=', $user['group_id'])->get();
  }
}
