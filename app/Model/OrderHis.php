<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderHis extends Model
{
    protected $table='orders_history';
    
    protected $fillable=['order_id', 'content', 'user_id'];

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
