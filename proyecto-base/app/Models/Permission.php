<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    /**
     * mapeo de los campos a insertar masivamente
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];
}
