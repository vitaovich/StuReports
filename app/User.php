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
        'name', 'email', 'password',
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
      return $this->Role == 'Admin';
    }

    public function isInstructor()
    {
      return $this->Role == 'Instructor';
    }

    public function classrooms()
    {
        return $this->hasMany('App\Classroom', 'Teacher_id');
    }
}
