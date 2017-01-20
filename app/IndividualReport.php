<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualReport extends Model
{
  protected $primaryKey = 'Individual_Report_id';
  protected $table = 'individual_reports';

  protected $fillable = array(
    'Student_id',
    'Private_Comments',
    'Sprint',
  );
}
