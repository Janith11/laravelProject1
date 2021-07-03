<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['type', 'date', 'result', 'attempt'];

    
    
}
