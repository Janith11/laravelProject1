<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','f_name', 'm_name','l_name', 'email', 'password', 'nic_number', 'gender', 'contact_number', 'dob', 'address_no', 'address_lineone', 'address_linetwo', 'profile_img', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        // set many to one relation between tables
        return $this->belongsTo('App\Role');
    }

    public function student(){
        return $this->hasOne(Student::class,'user_id','id');
    }
    public function instructor(){
        return $this->hasOne(Instructor::class, 'user_id', 'id');
    }

    public function posts(){
        return $this->hasMany(Posts::class, 'user_id', 'id');
    }

}

// pending = 0
// active = 1
// complete = 2
