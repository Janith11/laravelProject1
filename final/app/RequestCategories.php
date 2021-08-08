<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCategories extends Model
{
    protected $fillable = ['request_id', 'category_code'];
}
