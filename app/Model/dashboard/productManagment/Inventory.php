<?php

namespace App\Model\dashboard\productManagment;

use App\Model\Country;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table="inventories";

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
