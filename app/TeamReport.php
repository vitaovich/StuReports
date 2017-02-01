<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamReport extends Model
{
  protected $primaryKey = 'Team_Report_ID';
  protected $table = 'team_reports';

  protected $fillable = array(
    'easiest_understand',
    'hardest_understand',
    'easiest_approach',
    'hardest_approach',
    'easiest_solve',
    'hardest_solve',
    'easiest_evaluate',
    'hardest_evaluate',
    'pace',
    'client',
    'comments',
    'group_id',
    'sprint',
  );
  
  public function group()
  {
	  return $this->belongsTo('App\Project_group', 'group_id');
  }
}
