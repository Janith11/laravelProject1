<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorWorkingTimeSlot extends Model
{
    protected $fillable=['time_slot_id','instructor_uid'];
    public function releventinstructor(){
        return $this->hasMany(User::class,'id','instructor_uid');
    }
}
