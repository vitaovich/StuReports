<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $primaryKey = 'Task_id';
  protected $table = 'tasks';

  protected $fillable = array(
    'Description',
    'Student_id',
    'Status',
    'Group_id',
  );
}
