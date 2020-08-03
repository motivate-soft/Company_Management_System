<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = "customers";
    protected $fillable = [
        'sales_employee', 'nickname', 'customer_name', 'entity_type', 'entity_name', 'position',
        'mobile_number', 'landline_number', 'fax', 'zipcode', 'email', 'country', 'city', 'district','street',
        'address'
    ];

    public function purchase(){
        return $this->hasMany('App\Model\Purchases', 'id', 'id');
    }
}
