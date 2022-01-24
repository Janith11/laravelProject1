<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpandRequests extends Model
{
    protected $fillable = ['user_id', 'number', 'status'];

    public function requestcategories(){
        return $this->hasMany(requestcategories::class, 'request_id', 'id');
    }

    public function expandUsers(){
        return $this->hasMany(user::class, 'id', 'user_id');
    }
}
