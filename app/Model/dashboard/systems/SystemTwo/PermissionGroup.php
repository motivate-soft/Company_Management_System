<?php

namespace App\Model\dashboard\systems\SystemTwo;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $table = "system2_permissiongroups";

    public function permissions()
    {
        return $this->belongsToMany('App\Model\dashboard\systems\SystemTwo\Permission', 'system2_permission_permissiongroup', 'permissiongroup_id', 'permission_id');
    }
}
