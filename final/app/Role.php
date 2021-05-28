<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    public function users(){
        // set one to many relation between tables
        return $this->hasMany('App\User');
    }
}
