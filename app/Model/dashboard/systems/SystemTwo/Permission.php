<?php

namespace App\Model\dashboard\systems\SystemTwo;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = "system2_permissions";

    public function permissiongroups()
    {
        return $this->belongsToMany('App\Model\dashboard\systems\SystemTwo\PermissionGroup', 'system2_permission_permissiongroup', 'permission_id', 'permissiongroup_id');
    }
}
