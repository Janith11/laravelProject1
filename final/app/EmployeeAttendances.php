<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendances extends Model
{
    protected $fillable = ['user_id', 'date', 'present_time', 'leave_time', 'status'];
}
