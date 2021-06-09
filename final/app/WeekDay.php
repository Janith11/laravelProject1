<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    protected $fillable = ['day_name'];

    public function timeslots(){
        return $this->hasMany(TimeSlots::class, 'weekday_id', 'id');
    }
}
