<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cutting extends Model
{
    protected $guarded=[];

    public function productCutting(){
        return $this->belongsTo(ProductCutting::class,'id', 'cutting_id');
    }
}
