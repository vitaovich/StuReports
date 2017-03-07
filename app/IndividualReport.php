<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualReport extends Model
{
  protected $table = 'individual_reports';

  protected $fillable = array(
    'student_id',
    'private_comments',
    'sprint',
    'total_hours'
  );

  public function students()
  {
	  return $this->belongsTo('App\User');
  }

  public function timeLogs()
  {
	  return $this->hasMany('App\IndividualTimeLog', 'individual_report_id');
  }

  public function taskReports()
  {
	  return $this->hasMany('App\TaskReport', 'individual_report_id');
  }

  public function taskEvaluations()
  {
	  return $this->hasMany('App\Task_evaluation', 'individual_report_id');
  }

  public function memberEvaluations()
  {
	  return $this->hasMany('App\Member_evaluation', 'individual_report_id');
  }

  public function totalHours()
  {
  return $this->total_hours;
  }
  public static function getHours($studentID, $sprint)
  {
    $hours = IndividualReport::where('student_id', $studentID)->where('sprint', $sprint)->first();//->total_hours;
    if(is_null($hours) == false)
    {
      $total = $hours->totalHours();
      return $total;
    }		
    return 0;
  }
}
