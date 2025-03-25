<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('Client/cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $new_order = new Orders();
        $new_order->user_id = auth('customer')->id();
        $new_order->total_price;
        $new_order->status;

        $new_order->save();

        $new_orderDetails = new OrderDetails();
        $new_orderDetails->order_id;
        $new_orderDetails->RVID;
        $new_orderDetails->quantity;
        $new_orderDetails->price;

        $new_orderDetails->save();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
