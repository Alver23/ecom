<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 26/08/17
 * Time: 09:51 AM
 */

namespace Ecom\DataTables;

use Datatables;
use Ecom\Repositories\MenuRepository;
use Illuminate\Support\Facades\Log;

class MenuDataTable
{

    public function ajax()
    {
        \DB::enableQueryLog();
        $data = $this->query();
        $result =  Datatables::of($data)
            ->addColumn('action', function($model) {
                $button = "<button class='btn btn-primary editMenu' data-id=$model->id> Editar</button>";
                $button .= " <button class='btn btn-danger deleteMenu' data-id=$model->id> Eliminar</button>";
                return $button;
            })
            ->editColumn('parent_menu_id' , function($model) {
                return $model->parentMenu->name ?? null;
            })
            ->make(true);

        $query = \DB::getQueryLog();
        $lastQuery = end($query);
        Log::debug($lastQuery);
        return $result;
    }

    public function query()
    {
        return app(MenuRepository::class)->all();
    }
}