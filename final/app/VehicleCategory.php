<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    protected $fillable = ['category_code', 'name', 'base_type'];

    // create relation vehcile category and session hours
    public function sessionhours(){
        return $this->hasMany(SessionHour::class, 'category_id', 'id');
    }

    //training vehicle category
    public function trainingvehiclecategorys(){
        return $this->hasMany(TrainingVehicleCategory::class, 'category_id', 'id');
    }
}
