<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\RingVariants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Check if ring variant exists
        $variant = RingVariants::find($request->ring_variant_id);
        if (!$variant || $variant->Stock_quantity < 1) {
            return redirect()->back()->with('error', 'Selected size is out of stock.');
        }

        // Create order
        $order = Orders::create([
            'user_id' => $user->id,
            'total_price' => $request->price * $request->quantity,
            'status' => 'pending',
        ]);

        // Create order details
        OrderDetails::create([
            'order_id' => $order->id,
            'RVID' => $variant->id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        // Reduce stock quantity
        $variant->Stock_quantity -= $request->quantity;
        $variant->save();

        return redirect('/cart')->with('success', 'Item added to cart successfully.');
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
