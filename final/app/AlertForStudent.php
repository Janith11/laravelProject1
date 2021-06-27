<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlertForStudent extends Model
{
    protected $fillable = ['shedulealert_id','student_id', 'alert_status'];
}
