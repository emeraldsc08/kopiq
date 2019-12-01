<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(order $model)
    {
        return view('orders.index', ['orders' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new order
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created order in storage
     *
     * @param  \App\Http\Requests\orderRequest  $request
     * @param  \App\order  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, order $model)
    {

        Order::create($request->all());

        return redirect()->route('order.index')->withStatus(__('order successfully created.'));
    }

    /**
     * Show the form for editing the specified order
     *
     * @param  \App\order  $order
     * @return \Illuminate\View\View
     */
    public function edit(order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified order in storage
     *
     * @param  \App\Http\Requests\orderRequest  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, order  $order)
    {
        $order->update($request->all());

        return redirect()->route('order.index')->withStatus(__('order successfully updated.'));
    }

    /**
     * Remove the specified order from storage
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(order $order)
    {
        $order->delete();

        return redirect()->route('order.index')->withStatus(__('order successfully deleted.'));
    }
}
