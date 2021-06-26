<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class SheduledStudents extends Model
{
    protected $fillable = ['shedule_id','student_id'];

    // make relation between sheeduledstudents and ownershedule model
    public function ownershedule(){
        return $this->belongsTo(OwnerShedule::class, 'shedule_id', 'id');
    }

    // make function between sheduledstudent and student
    public function student(){
        return $this->belongsTo(Student::class,  'student_id', 'user_id');
    }
}
