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

        return DataTables::of($permissions)
            ->addColumn('action', function ($permission) {
                $button = "<button class='btn btn-primary editPermission' data-id=$permission->id>Editar</button> ";
                $button .= " <button class='btn btn-danger deletePermission' data-id=$permission->id>Eliminar</button>";
                return $button;
            })
            ->make(true);
    }

    public function query()
    {
        return Permission::get();
    }
}
