<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['to','from','has_read','text'];

    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }
}
