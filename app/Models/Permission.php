<?php

namespace App\Models;

use Backpack\PermissionManager\app\Models\Permission as BackpackPermission;
use Log;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class Permission extends BackpackPermission
{
  const PERMISSION_NEWS = 'news';
  const PERMISSION_CARS = 'cars';

  public function getNameAttribute($name)
  {
      return trans('app.permissions.'.$name) == 'app.permissions.'.$name
          ? $name
          : trans('app.permissions.'.$name);
  }

  public static function findByName($name)
  {
      $permission = static::getPermissions()->where('name', $name)->first();

      if (! $permission) {
          Log::error('Non-existing permission: '.$name.'. Existing are: '.print_r(static::getPermissions()->pluck('name'), true));
          throw new PermissionDoesNotExist();
      }

      return $permission;
  }
}
