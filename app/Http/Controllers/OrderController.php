<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();

        return view('order', compact('orders'));
    }

    public function create()
    {
        $orders = Order::all();
        $customers = Customer::all();
        $vehicles = Vehicle::all();
        return view('createOrder', compact('orders', 'customers','vehicles'));
    }

    public function store(Request $request)
    {
        $order = new Order;

        $order->Customer_ID = $request->Customer_ID;
        $order->Vehicle_ID = $request->Vehicle_ID;
        $order->total_price = $request->total_price;
    
        $order->save();
    
        return redirect(route('orders.index'));
    }

    public function show(string $id)
    {
        $order = Order::where('id', $id)->first();
        $vehicle = Vehicle::where('id', $order->Vehicle_ID)->first();
        $customer = Customer::where('id', $order->Customer_ID)->first();
        $customers = Customer::all();

        return view('showOrder', compact('order', 'vehicle', 'customer', 'customers'));
    }

    public function edit(string $id)
    {
        $order = Order::where('id', $id)->first();
        $customers = Customer::all();
        $vehicles = Vehicle::all();
        $vehicle = Vehicle::where('id', $order->Vehicle_ID)->first();
        $customer = Customer::where('id', $order->Customer_ID)->first();

        return view('editOrder', compact('order', 'vehicle', 'customer', 'vehicles', 'customers'));
    }

    public function update(Request $request, string $id)
    {
        Order::where('id', $id)->update([
            'Customer_ID' => $request->Customer_ID,
            'Vehicle_ID' => $request->Vehicle_ID,
            'total_price' => $request->total_price
        ]);

        return redirect(route('orders.index'));
    }

    public function destroy(string $id)
    {
        Order::where('id', $id)->delete();

        return redirect(route('orders.index'));
    }
}
