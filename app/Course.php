<?php
//Need to rename to course
namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $primaryKey = 'id';

  public function projects()
  {
      return $this->hasMany('App\Project_group', 'course_id');
  }

  public function instructor()
  {
      return $this->belongsTo('App\User', 'Teacher_id');
  }
}
