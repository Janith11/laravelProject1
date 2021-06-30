<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionHour extends Model
{
    protected $fillable = ['category_id', 'session_type', 'total_days'];
}
