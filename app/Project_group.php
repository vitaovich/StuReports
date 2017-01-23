<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_group extends Model
{
    protected $primaryKey = 'Group_id';

    public function classroom()
    {
        return $this->belongsTo('App\Classroom', 'Class_id');
    }
}
