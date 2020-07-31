<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $guarded=[];
    public function products()
    {
        return $this->belongsToMany(Product::class);

    }
}
