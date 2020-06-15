<?php

namespace App\Models;

use Backpack\PermissionManager\app\Models\Role as BackpackRole;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Traits\HasPermissions;

class Role extends BackpackRole
{
    use HasPermissions;

    const ROLE_ADMIN = 'admin';

    public function permissions()
    {
        return $this->belongsToMany(
            config('laravel-permission.models.permission'),
            config('laravel-permission.table_names.role_has_permissions')
        );
    }

    public function getNameAttribute($name)
    {
        return trans('app.roles.'.$name) == 'app.roles.'.$name
            ? $name
            : trans('app.roles.'.$name);
    }

    public static function findByName($name)
    {
        $role = static::all()->where('name', $name)->first();

        if (! $role) {
            throw new RoleDoesNotExist();
        }

        return $role;
    }
}
