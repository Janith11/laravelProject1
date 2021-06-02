<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerShedule extends Model
{
    public function sheduledstudents(){
        return $this->hasMany('App\SheduledStudents');
    }
}
