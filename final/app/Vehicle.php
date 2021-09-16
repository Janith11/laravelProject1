<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'image','name','category','transmission','condition','mileage'
    ];
}
