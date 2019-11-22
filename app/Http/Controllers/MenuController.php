<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(menu $model)
    {
        return view('menus.index', ['menus' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new menu
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created menu in storage
     *
     * @param  \App\Http\Requests\menuRequest  $request
     * @param  \App\menu  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, menu $model)
    {
        
        Menu::create($request->all());

        return redirect()->route('menu.index')->withStatus(__('menu successfully created.'));
    }

    /**
     * Show the form for editing the specified menu
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\View\View
     */
    public function edit(menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified menu in storage
     *
     * @param  \App\Http\Requests\menuRequest  $request
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, menu  $menu)
    {
        $menu->update($request->all());

        return redirect()->route('menu.index')->withStatus(__('menu successfully updated.'));
    }

    /**
     * Remove the specified menu from storage
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->withStatus(__('menu successfully deleted.'));
    }
}
