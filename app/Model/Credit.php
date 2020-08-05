<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected function customer(){
        return $this->hasMany('App\Model\dashboard\systems\SystemOne\Customer', 'id', 'id');
    }
}
