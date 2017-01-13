<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamReport extends Model
{
  protected $primaryKey = 'Team_Report_ID';
  protected $table = 'team_reports';

  protected $fillable = array(
    'Easiest_Understand',
    'Hardest_Understand',
    'Easiest_Approach',
    'Hardest_Approach',
    'Easiest_Solve',
    'Hardest_Solve',
    'Easiest_Evaluate',
    'Hardest_Evaluate',
    'Pace',
    'Client',
    'Comments',
    'Group_id',
    'Sprint',
  );
}
