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
        'name', 'email', 'password', 'Role',
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

    public function courses()
    {
        return Course::All();
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
}
