<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualTimeLog extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'time_logs';

  protected $fillable = array(
    'individual_report_id',
    'day',
    'hours',
    'description',
  );
}
