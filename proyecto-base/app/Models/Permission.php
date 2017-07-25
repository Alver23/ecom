<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use SoftDeletes;
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
