<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class OwnerShedule extends Model
{

    protected $fillable = ['title','date','color','textColor','time','lesson_type','instructor','shedule_status'];

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

}
