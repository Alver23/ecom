<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 26/08/17
 * Time: 09:50 AM
 */

namespace Ecom\Repositories;

use Ecom\Models\Menu;

class MenuRepository extends EloquentRepository
{
    public function __construct(Menu $modelClass)
    {
        parent::__construct($modelClass);
    }
}