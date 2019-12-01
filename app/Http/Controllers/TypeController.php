<?php

namespace App\Http\Controllers;

use App\Type;
use App\Supplier;
use App\Exports\PesananExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
        $types = Type::with('supplier')->get();
        return view('types.index', ['types' => $model->paginate(15)], compact('types'));
    }

    /**
     * Show the form for creating a new type
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('types.create', compact( 'suppliers'));
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
        // $type = new Type();
        // $type->nama = $request->input('nama');
        // $type->stock = $request->input('stock');
        // $type->id_supplier = $request->input('supplier');
        // $type->description = $request->input('description');
        // $type->save();

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
        $suppliers = Supplier::all();
        return view('types.edit', compact('type', 'suppliers'));
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
    public function exportToExcel()
    {
        return Excel::download(new PesananExport, 'Type.xlsx');
    }
    public function getWithJson($id)
    {
        $type = Type::where('id', $id)->with('supplier')->first();
        return response()->json($type);
    }
}
