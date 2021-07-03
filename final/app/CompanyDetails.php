<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    protected $fillable = ['company_name', 'contact_number', 'email', 'logo', 'address_no', 'address_lineone', 'address_linetwo'];
}
