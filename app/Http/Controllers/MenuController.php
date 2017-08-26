<?php

namespace Ecom\Http\Controllers;

use Ecom\DataTables\MenuDataTable;
use Ecom\Models\Menu;
use Ecom\Repositories\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //config(['app.timezone' => 'America/Bogota']);
        //dd(config('app.timezone'));
        $parentMenus = app(MenuRepository::class)->findManyBy('parent_menu_id', null);
        return view('admin.menu.index', compact('parentMenus'));
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
        app(MenuRepository::class)->create($request->all());

        return response_json(201, 'Registro creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ecom\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ecom\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MenuRepository $repository, $id)
    {
        if ($request->ajax()) {
            return response_json(200, 'success', 'success', $repository->find($id)->toArray());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ecom\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuRepository $repository, $id)
    {
        if ($request->ajax()) {
            $repository->update($id, $request->all());
            return response_json(201, 'Registro fue actualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ecom\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MenuRepository $repository, $id)
    {
        if ($request->ajax()) {
            $menu = $repository->find($id);
            if (count($repository->findManyBy('parent_menu_id', $menu->id)) > 0) {
                return response_json(200, 'No se puede eliminar, porque tiene sub menus', 'error');
            }
            $menu->delete();
            return response_json(200, 'Registro eliminado');
        }
        abort(404);
    }

    public function lista(Request $request, MenuDataTable $datable)
    {
        return $datable->ajax();
    }
}
