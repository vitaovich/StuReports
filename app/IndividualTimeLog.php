<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualTimeLog extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'time_logs';

  protected $fillable = array(
    'Individual_Report_id',
    'Day',
    'Hours',
    'Description',
  );
}
