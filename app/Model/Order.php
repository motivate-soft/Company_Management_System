<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];

    public function products()
    {
        return $this->hasMany(Cart::class);
    }

    // public function fromUser(){
    //     return $this->belongsTo('App\User','from_user_id', 'id');
    // }

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
