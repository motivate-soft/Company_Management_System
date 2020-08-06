<?php

namespace App\Model\dashboard\systems\SystemFour;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = "system4_quotations";

    protected $fillable = [
        'employee_id', 'customer_id', 'membership_number', 'filename', 'invoice_number', 'invoice_date',
        'project_name', 'discount_rate', 'status', 'products', 'quantity', 'report_id'
    ];

    public function customer(){
        return $this->belongsTo('App\Model\dashboard\systems\SystemOne\Customer', 'customer_id', 'id');
    }

    public function staff(){
        return $this->belongsTo('App\Model\dashboard\systems\SystemTwo\Staff', 'employee_id', 'id');
    }
}
