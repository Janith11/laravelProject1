<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    protected $fillable = ['shedule_id', 'user_id', 'category_code', 'grade'];
}
