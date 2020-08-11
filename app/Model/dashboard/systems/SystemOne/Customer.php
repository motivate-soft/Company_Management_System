<?php

namespace App\Model\dashboard\systems\SystemOne;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "system1_customers";
    protected $fillable = [
        'employee_id', 'customer_id', 'customer_name', 'membership', 'entry_type', 'entry_name', 'position',
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

    public function quotation() {
        return $this->hasMany('App\Model\dashboard\systems\SystemOne\Quotation', 'id', 'id');
    }

    public function staff() {
        return $this->belongsTo('App\Model\dashboard\systems\SystemTwo\Staff', 'employee_id', 'id');
    }
}
