<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenHour extends Model
{
    protected $fillable = ['weekday_id', 'from', 'to'];
}
