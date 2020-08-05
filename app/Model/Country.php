<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    //
    protected $table = "countries";

    protected function customer(){
        return $this->hasMany('App\Model\dashboard\systems\SystemOne\Customer', 'id', 'id');
    }
}
