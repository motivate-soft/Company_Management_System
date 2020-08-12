<?php

namespace App\Model\dashboard\systems\SystemFour;

use Illuminate\Database\Eloquent\Model;

class ProductQuotation extends Model
{
    protected $table = "product_quotation";
    protected $fillable = [
        'quotation_id', 'product_id'
    ];

}
