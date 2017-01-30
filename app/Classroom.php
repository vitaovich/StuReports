<?php
//Need to rename to course
namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
  protected $primaryKey = 'Class_id';

  public function projects()
  {
      return $this->hasMany('App\Project_group', 'Class_id');
  }

  public function instructor()
  {
      return $this->belongsTo('App\User', 'Teacher_id');
  }
}
