<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    protected $fillable = ['user_id', 'type','description','amount'];

    // user
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // user
    public function student(){
        return $this->belongsTo(Student::class, 'user_id', 'user_id');
    }
}
