<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=['order_id','detail','fee','tax','total_price'];
}
