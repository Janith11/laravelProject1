<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam_Dates extends Model
{
    protected $fillable = ['exam_type', 'exam_date', 'exam_start_time', 'exam_end_time', 'vehicle_category'];
}
