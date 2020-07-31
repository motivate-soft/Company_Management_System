<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];

   public function sizes()
   {
       return $this->belongsToMany(Size::class,'product_sizes')->withPivot('price');
   }
    public function cuttings()
    {
        return $this->belongsToMany(Cutting::class,
            'product_cuttings');
    }
    public function packings()
    {
        return $this->belongsToMany(Packing::class,
            'product_packings');
    }
}
