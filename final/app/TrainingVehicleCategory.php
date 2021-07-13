<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingVehicleCategory extends Model
{
    protected $fillable = ['category_id', 'user_id'];

    public function vehiclecategory(){
        return $this->belongsTo(VehicleCategory::class, 'category_id', 'id');
    }
}
