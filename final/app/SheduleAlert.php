<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SheduleAlert extends Model
{
    protected $fillable = ['shedule_id','message'];

    // create relation between shedule alert and alert for students
    public function alertforstudents(){
        return $this->hasMany(AlertForStudent::class, '	shedulealert_id', 'id');
    }

    // create relation between shedule alert and owner shedules
    public function ownershedule(){
        return $this->belongsTo(OwnerShedule::class, 'shedule_id', 'id');
    }
}
