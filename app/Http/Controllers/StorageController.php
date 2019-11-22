<?php

namespace App\Http\Controllers;

use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(storage $model)
    {
        return view('storages.index', ['storages' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new storage
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('storages.create');
    }

    /**
     * Store a newly created storage in storage
     *
     * @param  \App\Http\Requests\storageRequest  $request
     * @param  \App\storage  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, storage $model)
    {
        
        Storage::create($request->all());

        return redirect()->route('storage.index')->withStatus(__('storage successfully created.'));
    }

    /**
     * Show the form for editing the specified storage
     *
     * @param  \App\storage  $storage
     * @return \Illuminate\View\View
     */
    public function edit(storage $storage)
    {
        return view('storages.edit', compact('storage'));
    }

    /**
     * Update the specified storage in storage
     *
     * @param  \App\Http\Requests\storageRequest  $request
     * @param  \App\storage  $storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, storage  $storage)
    {
        $storage->update($request->all());

        return redirect()->route('storage.index')->withStatus(__('storage successfully updated.'));
    }

    /**
     * Remove the specified storage from storage
     *
     * @param  \App\storage  $storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(storage $storage)
    {
        $storage->delete();

        return redirect()->route('storage.index')->withStatus(__('storage successfully deleted.'));
    }
}
