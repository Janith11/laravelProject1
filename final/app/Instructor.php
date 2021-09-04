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

    // realtion with employee attendances
    public function employeeatendancess(){
        return $this->hasMany(EmployeeAttendances::class, 'user_id', 'user_id');
    }

    //relation with employee leaves
    public function emplooyeeleaves(){
        return $this->hasMany(EmplooyeeLeave::class, 'user_id', 'user_id');
    }

    // relation with student_categories
    public function categories(){
        return $this->hasMany(StudentCategory::class, 'user_id', 'user_id');
    }
}
