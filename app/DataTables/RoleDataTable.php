<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 19/08/17
 * Time: 10:49 AM
 */

namespace Ecom\DataTables;

use Datatables;
use Ecom\Repositories\RoleRepository;

class RoleDataTable
{
    public function ajax()
    {
        $data = $this->query();
        return Datatables::of($data)
            ->addColumn('action', function($model){
                $button = '';
                $button .= "<button class='btn btn-primary  editRole' data-id=$model->id>Editar</button> ";

                $button .= " <button class='btn btn-danger  deleteRole' data-id=$model->id>Eliminar</button>";
                return $button;
            })
            ->make(true);
    }
    public function query()
    {
        return app(RoleRepository::class)->all();
    }
}