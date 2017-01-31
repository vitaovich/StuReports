<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualReport extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'individual_reports';

  protected $fillable = array(
    'student_id',
    'private_comments',
    'sprint',
  );
}
