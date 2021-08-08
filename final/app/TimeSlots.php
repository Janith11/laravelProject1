<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlots extends Model
{
    protected $fillable = ['weekday_id', 'time_slot', 'slot_name'];
    public function instructor_working_time_slot(){
        return $this->hasMany(InstructorWorkingTimeSlot::class, 'time_slot_id', 'id');
    }
    
}
