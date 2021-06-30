<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // create relation between instructor and owner shedule
    public function ownershedules(){
        return $this->hasMany(OwnerShedule::class, 'instructor', 'user_id');
    }
}
