<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected function customer(){
        return $this->hasMany('App\Model\dashboard\systems\SystemOne\Customer', 'id', 'id');
    }
}
