<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 2/04/17
 * Time: 10:55 PM.
 */

namespace App\DataTables;

use App\Models\Permission;
use App\Repositories\PermissionRepository;
use Datatables;

class PermissionDataTable
{
    public function ajax()
    {
        $permissions = $this->query();

        return DataTables::of($permissions)->make(true);
    }

    public function query()
    {
        return Permission::get();
    }
}
