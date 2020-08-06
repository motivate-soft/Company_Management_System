<?php

namespace App\Model\dashboard\systems\SystemOne;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "system1_purchases";
    protected $fillable = [
        'customer_id', 'description', 'coupon_number', 'amount', 'disbursement'
    ];

    public function customer() {
        return $this->belongsTo('App\Model\dashboard\systems\SystemOne\Customer', 'customer_id', 'id');
    }
}
