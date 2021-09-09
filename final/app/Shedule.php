<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    protected $fillable = ['title','date','time','lesson_type','instructor', 'vahicle_category', 'transmission','shedule_status'];

    public function sheduledstudents(){
        return $this->hasMany(SheduledStudents::class, 'shedule_id', 'id');
    }

    public function shedulealert(){
        return $this->hasOne(SheduleAlert::class, 'shedule_id', 'id');
    }

    public function attendance(){
        return $this->hasMany(Attendance::class, 'shedule_id', 'id');
    }

    public function instructor(){
        return $this->belongsTo(Instructor::class, 'user_id', 'instructor');
    }

    public function shedulerequests(){
        return $this->hasMany(SheduleRequest::class, 'shedule_id', 'id');
    }

}
