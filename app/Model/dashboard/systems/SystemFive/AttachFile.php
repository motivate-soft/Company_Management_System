<?php

namespace App\Model\dashboard\systems\SystemFive;

use Illuminate\Database\Eloquent\Model;

class AttachFile extends Model
{
    protected $table = "system5_attachfiles";
    protected $fillable = 'company_id';
}
