<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles as OriginalHasRoles;

trait HasRoles
{
    use OriginalHasRoles {
        OriginalHasRoles::hasRole as originalHasRole;
        OriginalHasRoles::hasPermissionTo as originalHasPermissionTo;
        OriginalHasRoles::hasDirectPermission as originalHasDirectPermission;
    }

    public function hasRole($roles)
    {
        return $this->originalHasRole($roles);
    }

    public function hasPermissionTo($permission)
    {
        if (is_array($permission)) {
            foreach ($permission as $permission_item) {
                if ($this->hasPermissionTo($permission_item)) {
                    return true;
                }
            }
            return false;
        }

        if ($this->hasRole(Role::ROLE_ADMIN)) {
            return true;
        }

        return is_string($permission)
            ? $this->originalHasPermissionTo(trans('app.permissions.'.$permission))
            : $this->originalHasPermissionTo($permission);
    }

    public function hasDirectPermission($permission)
    {
        if (is_array($permission)) {
            foreach ($permission as $permission_item) {
                if ($this->hasDirectPermission($permission_item)) {
                    return true;
                }
            }
            return false;
        }

        return is_string($permission)
            ? $this->originalHasDirectPermission(trans('app.permissions.'.$permission))
            : $this->originalHasDirectPermission($permission);
    }
}
