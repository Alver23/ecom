<?php

namespace Ecom\Http\Controllers;

use Ecom\DataTables\RoleDataTable;
use Ecom\Repositories\PermissionRepository;
use Ecom\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $permissions = app(PermissionRepository::class)->all();
        return view('role.index', compact('permissions'));
    }
    public function list(Request $request, RoleDataTable $dataTable)
    {
        if ($request->ajax()) {
            return $dataTable->ajax();
        }
    }

    public function store(Request $request)
    {
        $role = app(RoleRepository::class)->create($request->all());
        $role->perms()->sync($request->input('permission_id'));
        return response_json(201, trans('message.create'));
    }
}
