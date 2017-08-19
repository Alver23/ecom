<?php

namespace Ecom\Http\Controllers;

use Ecom\DataTables\PermissionDataTable;
use Ecom\Http\Requests\PermissionRequest;
use Ecom\Models\Permission;
use Ecom\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use Datatables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permission');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        app(PermissionRepository::class)->create($request->all());
        return response_json(201, 'Registro creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $result = app(PermissionRepository::class)->find($id);
            return response_json(200, 'success', 'success', $result->toArray());
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        if ($request->ajax()) {
            $result = app(PermissionRepository::class)->find($id);
            $result->update($request->all());
            return response_json(200, 'Registro Actualizado', 'success', $result->toArray());
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        app(PermissionRepository::class)->find($id)->delete();
        return response_json(200, 'Eliminado satisfactoriamente');
    }

    public function list(Request $request, PermissionDataTable $dataTable)
    {
        if ($request->ajax()) {
            return $dataTable->ajax();
        }
    }
}
