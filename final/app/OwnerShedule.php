<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerShedule extends Model
{
    public function sheduledstudents(){
        return $this->hasMany(SheduledStudents::class, 'shedule_id', 'id');
    }
}
