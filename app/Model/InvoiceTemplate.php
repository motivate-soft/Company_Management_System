<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceTemplate extends Model
{
    protected $fillable=['content', 'name', 'short_code', 'content_ar'];
}
