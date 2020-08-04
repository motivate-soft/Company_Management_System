<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class purchases extends Model
{
    protected $table = "purchases";
    protected $fillable = [
        'customer_id', 'description', 'coupon_number', 'amount', 'disbursement'
    ];

    public function customer() {
        return $this->belongsTo('App\Model\Customers', 'customer_id', 'id');
    }
}
