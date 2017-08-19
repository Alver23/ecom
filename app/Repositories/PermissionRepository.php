<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 12/08/17
 * Time: 11:33 AM
 */

namespace Ecom\Repositories;

use Ecom\Models\Permission;

class PermissionRepository extends EloquentRepository
{
    public function __construct(Permission $modelClass)
    {
        parent::__construct($modelClass);
    }
}