<?php
//Need to rename to course
namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $fillable = array(
		'teacher_id',
        'year',
        'quarter',
        'course_number',
        'sprint_length',
	);

  public function projects()
  {
      return $this->hasMany('App\Project_group', 'course_id');
  }

  public function quarterString() {
      $seasons = [1=>'Fall',2=>'Winter',3=>'Spring',4=>'Summer'];
      return $seasons[$this->quarter];
  }

  public function announcements()
  {
      return $this->hasMany('App\Announcement', 'course_id');
  }

  public function students()
  {
	  return $this->hasMany('App\User', 'course_id');
  }

  public function instructor()
  {
      return $this->belongsTo('App\User', 'teacher_id');
  }

  public function assignments()
  {
      return $this->hasMany('App\Assignment', 'course_id');
  }
}
