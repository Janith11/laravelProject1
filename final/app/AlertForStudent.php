<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// 0 - unread
// 1 - read

class AlertForStudent extends Model
{
    protected $fillable = ['shedulealert_id','student_id', 'alert_status'];

    public function shedulealert(){
        return $this->belongsTo(SheduleAlert::class, 'shedulealert_id', 'id');
    }
}
