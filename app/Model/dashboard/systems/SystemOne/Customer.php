<?php

namespace App\Model\dashboard\systems\SystemOne;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "system1_customers";
    protected $fillable = [
        'sales_employee', 'nickname', 'customer_name', 'entry_type', 'entry_name', 'position',
        'mobile_number', 'landline_number', 'fax', 'zipcode', 'email', 'country_id','province_id', 'city_id','street_id',
        'address'
    ];

    public function purchase(){
        return $this->hasMany('App\Model\dashboard\systems\SystemOne\Purchases', 'id', 'id');
    }

    public function country(){
        return $this->belongsTo('App\Model\Country', 'country_id', 'id');
    }

    public function province(){
        return $this->belongsTo('App\Model\State', 'province_id', 'id');
    }
    public function city(){
        return $this->belongsTo('App\Model\City', 'city_id', 'id');
    }
    public function street(){
        return $this->belongsTo('App\Model\Street', 'street_id', 'id');
    }

    public function credit(){
        return $this->belongsTo('App\Model\Credit', 'credit_id', 'id');
    }
}
