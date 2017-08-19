<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 12/08/17
 * Time: 11:53 AM
 */

namespace Ecom\DataTables;

use Datatables;
use Ecom\Repositories\PermissionRepository;

class PermissionDataTable
{
    public function ajax()
    {
        $data = $this->query();
        return Datatables::of($data)
            ->addColumn('action', function($model){
                $button = '';
                $button .= "<button class='btn btn-primary  editpermission' data-id=$model->id>Editar</button> ";

                $button .= " <button class='btn btn-danger  deletepermission' data-id=$model->id>Eliminar</button>";
                return $button;
            })
            ->make(true);
    }
    public function query()
    {
        return app(PermissionRepository::class)->all();
    }
}