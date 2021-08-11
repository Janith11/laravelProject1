<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['user_id','type', 'date', 'result', 'attempt'];

    public function practricalstudent(){
        return $this->belongsTo(Student::class,'user_id','user_id');
    }
    
}
