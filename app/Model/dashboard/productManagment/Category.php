<?php

namespace App\Model\dashboard\productManagment;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
}
