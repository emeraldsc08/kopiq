<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(type $model)
    {
        return view('types.index', ['types' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new type
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created type in storage
     *
     * @param  \App\Http\Requests\typeRequest  $request
     * @param  \App\type  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, type $model)
    {
        
        Type::create($request->all());

        return redirect()->route('type.index')->withStatus(__('type successfully created.'));
    }

    /**
     * Show the form for editing the specified type
     *
     * @param  \App\type  $type
     * @return \Illuminate\View\View
     */
    public function edit(type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified type in storage
     *
     * @param  \App\Http\Requests\typeRequest  $request
     * @param  \App\type  $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, type  $type)
    {
        $type->update($request->all());

        return redirect()->route('type.index')->withStatus(__('type successfully updated.'));
    }

    /**
     * Remove the specified type from storage
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(type $type)
    {
        $type->delete();

        return redirect()->route('type.index')->withStatus(__('type successfully deleted.'));
    }
}
