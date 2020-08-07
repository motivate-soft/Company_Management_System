<?php

namespace App\Model\dashboard\productManagment;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table = "brands";
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
}
