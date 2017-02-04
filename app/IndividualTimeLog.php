<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualTimeLog extends Model
{
  protected $table = 'time_logs';

  protected $fillable = array(
    'individual_report_id',
    'day',
    'hours',
    'description',
  );
  
  public function report()
  {
	  return $this->belongsTo('App\IndividualReport', 'individual_report_id');
  }
}
