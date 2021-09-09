<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SheduleRequest extends Model
{
    protected $fillable = ['shedule_id', 'user_id', 'status', 'shedule_status'];

    public function shedules(){
        return $this->belongsTo(Shedule::class, 'shedule_id', 'id');
    }
}
