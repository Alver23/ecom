<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionDataTable;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permission.index');
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
    public function store(Request $request)
    {
        $permission = Permission::create($request->all());
        return response()->json([
            'code' => Response::HTTP_CREATED,
            'type' => 'success',
            'message' => 'Registro creado satisfactoriamente',
            'description' => '',
            'data' => $permission->toArray()
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $permission = Permission::find($id);
            $permission->update($request->all());
            return response()->json([
                'code' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Registro Actualizado',
                'description' => '',
                'data' => $permission->toArray(),
            ], Response::HTTP_OK);
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $permission = Permission::find($id);
            $permission->delete();
            return response()->json([
                'code' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Registro Eliminado',
                'description' => '',
                'data' => []
            ], Response::HTTP_OK);
        }
        abort(404);
    }

    /**
     *
     * Query para mostrar los resultados en un dataTable
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\Controllers\PermissionDataTable $dataTable
     * @return mixed
     */
    public function list(Request $request, PermissionDataTable $dataTable)
    {
        if ($request->ajax()) {
            return $dataTable->ajax();
        }
        abort(Response::HTTP_NOT_FOUND);
    }
}
