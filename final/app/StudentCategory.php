<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCategory extends Model
{
    protected $fillable = ['user_id', 'category', 'tstatus', 'transmission'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function vehiclecategory(){
        return $this->belongsTo(VehicleCategory::class, 'category', 'category_code');
    }
    //relation with student_categories
    public function Instructorcategories(){
        return $this->belongsTo(Instructor::class, 'user_id', 'user_id');
    }
}
