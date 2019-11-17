<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(supplier $model)
    {
        return view('suppliers.index', ['suppliers' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new supplier
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created supplier in storage
     *
     * @param  \App\Http\Requests\supplierRequest  $request
     * @param  \App\supplier  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, supplier $model)
    {
        
        Supplier::create($request->all());

        return redirect()->route('supplier.index')->withStatus(__('supplier successfully created.'));
    }

    /**
     * Show the form for editing the specified supplier
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\View\View
     */
    public function edit(supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified supplier in storage
     *
     * @param  \App\Http\Requests\supplierRequest  $request
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, supplier  $supplier)
    {
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->withStatus(__('supplier successfully updated.'));
    }

    /**
     * Remove the specified supplier from storage
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('supplier.index')->withStatus(__('supplier successfully deleted.'));
    }
}
