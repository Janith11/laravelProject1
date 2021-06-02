<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SheduledStudents extends Model
{
    public function ownershedule(){
        return $this->belongsTo('App\OwnerShedule');
    }
}
