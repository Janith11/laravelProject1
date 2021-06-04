<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['user_id', 'amount', 'total_fee', 'group_number'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
