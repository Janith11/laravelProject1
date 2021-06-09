<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlots extends Model
{
    protected $fillable = ['weekday_id', 'time_slot', 'slot_name'];
}
