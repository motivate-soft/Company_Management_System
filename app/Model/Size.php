<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany('App\Model\Product')->withPivot('price');
    }

    public function productSize()
    {
        return $this->belongsTo(ProductSize::class, 'id', 'size_id');
    }
}
