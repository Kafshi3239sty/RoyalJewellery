<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Rings;
use App\Models\RingVariants as ModelsRingVariants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RingVariants extends Controller
{
    //
    public function productdet($rid)
    {
        $ringdet = Rings::find($rid);
        return view('Admin/productdetails', ['ring' => $ringdet]);
    }

    public function productvardet(Request $request, $rid)
    {
        $ring = Rings::find($rid);

        if (!$ring) {
            return redirect()->back()->withErrors(['error' => 'Ring not found']);
        }

        $ringvar = new ModelsRingVariants();
        $ringvar->RID = $ring->id; // Store the ring ID
        $ringvar->size = $request->size;
        $ringvar->Stock_quantity = $request->stock;

        $ringvar->save();

        return redirect('/admin/your_products')->with('success', 'Ring variation added successfully.');
    }


    public function ringsDetails($rid)
    {
        $ringdet = Rings::find($rid);
        $orders = Orders::all()->where('user_id', Auth::id());
        return view('Client/ringdetails', ['ring' => $ringdet, 'orders' => $orders]);
    }

    public function checkSize($ringId, $size) {
        $variant = ModelsRingVariants::where('RID', $ringId)
                              ->where('size', $size)
                              ->where('Stock_quantity', '>', 0)
                              ->first();
        
        if ($variant) {
            return response()->json([
                'available' => true,
                'variant_id' => $variant->id,
                'price' => $variant->price
            ]);
        }
        return response()->json(['available' => false]);
    }
}
