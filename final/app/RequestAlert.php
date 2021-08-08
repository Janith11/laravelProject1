<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestAlert extends Model
{
    protected $fillable = ['user_id', 'description', 'status'];
}
