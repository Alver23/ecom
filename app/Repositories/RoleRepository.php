<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 19/08/17
 * Time: 10:48 AM
 */

namespace Ecom\Repositories;

use Ecom\Models\Role;

class RoleRepository extends EloquentRepository
{
    /**
     * RoleRepository constructor.
     *
     * @param \Ecom\Models\Role $modelClass
     */
    public function __construct(Role $modelClass)
    {
        parent::__construct($modelClass);
    }
}