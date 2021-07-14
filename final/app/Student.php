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

    // create relation between alert for students
    public function alertforstudents(){
        return $this->hasMany(AlertForStudent::class, 'student_id', 'user_id');
    }

    // create relation between attendance
    public function attendances(){
        return $this->hasMany(Attendance::class, 'user_id', 'user_id');
    }

    //exam details
    public function exams(){
        return $this->hasMany(Exam::class, 'user_id','user_id');
    }

    // training categories
    public function trainingvahiclecategorys(){
        return $this->hasMany(TrainingVehicleCategory::class, 'user_id', 'user_id');
    }
}
