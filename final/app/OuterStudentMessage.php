<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OuterStudentMessage extends Model
{
    protected $fillable = ['uid', 'name', 'message'];
}
