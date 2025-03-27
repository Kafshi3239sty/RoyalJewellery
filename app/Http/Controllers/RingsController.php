<?php

namespace App\Http\Controllers;

use App\Models\Rings;
use App\Models\RingVariants;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rings = Rings::all();
        return view('Admin/products', ['rings' => $rings]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
        return view('Admin/addproduct');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request): RedirectResponse
    {
        $new_ring = new Rings();
        $new_ring->name = $request->name;
        $new_ring->description = $request->description;
        $new_ring->material = $request->material;
        $new_ring->price = $request->price;
        // Ensure a file is uploaded before saving
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('ring-images', 'public');
            $new_ring->image_url = $filePath; // Store the file path only
        } else {
            return redirect()->back();
        }

        $new_ring->save();

        return redirect('/admin/your_products');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $rings = Rings::all();
        return view('Client/rings', ['rings' => $rings]);
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rings $rings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rings $rings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rings $rings)
    {
        //
    }
}
