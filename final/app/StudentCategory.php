<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCategory extends Model
{
    protected $fillable = ['user_id', 'category', 'tstatus', 'transmission'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
