<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['user_id', 'amount', 'total_fee', 'group_number'];

    // make retation between student and users
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // make relation between students and sheduledstudents model
    public function sheduledstudents(){
        return $this->hasMany(SheduledStudents::class, 'student_id', 'user_id');
    }
}
