<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Packing extends Model
{
    protected $guarded=[];

    public function productPacking(){
        return $this->belongsTo(ProductPacking::class,'id', 'packing_id');
    }
}
