<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('deleted', false)
                       ->with('user')
                       ->latest('order_date')
                       ->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_number'   => 'required|string|unique:orders',
            'customer_name'    => 'required|string|max:150',
            'customer_number'  => 'required|string|max:50',
            'fiscal_data'      => 'nullable|string',
            'order_date'       => 'required|date',
            'delivery_address' => 'required|string',
            'notes'            => 'nullable|string',
        ]);

        Order::create([
            ...$request->all(),
            'user_id' => auth()->id(),
            'status'  => 'Ordered',
            'deleted' => false,
        ]);

        return redirect()->route('orders.index')
                         ->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load('photoEvidences', 'user');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name'    => 'required|string|max:150',
            'delivery_address' => 'required|string',
            'status'           => 'required|in:Ordered,In process,In route,Delivered',
            'notes'            => 'nullable|string',
        ]);

        $order->update($request->only(
            'customer_name', 'delivery_address', 'status', 'notes'
        ));

        return redirect()->route('orders.show', $order)
                         ->with('success', 'Order updated.');
    }

    public function destroy(Order $order)
    {
        // Logical delete — does NOT remove from database
        $order->update(['deleted' => true]);
        return redirect()->route('orders.index')
                         ->with('success', 'Order archived.');
    }

    public function archived()
    {
        $orders = Order::where('deleted', true)->latest()->get();
        return view('orders.archived', compact('orders'));
    }

    public function restore($id)
    {
        Order::where('id', $id)->update(['deleted' => false]);
        return redirect()->route('orders.archived')
                         ->with('success', 'Order restored.');
    }
}