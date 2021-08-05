<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmplooyeeLeave extends Model
{
    protected $fillable = ['user_id', 'reson', 'start_date', 'end_date', 'status'];

    public function instructor(){
        return $this->belongsTo(Instructor::class, 'user_id', 'user_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
