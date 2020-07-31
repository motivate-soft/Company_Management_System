<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded=[];

    public function product(){
        return $this->hasOne('App\Model\Product', 'id', 'product_id');
    }
}
