<?php

namespace App\Http\Controllers;

use App\Models\Rings;
use App\Models\RingVariants;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    //

    public function adminLoginForm()
    {
        return view('Admin/adminLogin');
    }

    public function adminLogin(Request $request)
    {
        // Validate the form data
        $credentials =  $request->validate([
            'Email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            $request->session()->regenerate();
            return redirect('/admin/dashboard');

            // Failed login
            return redirect('/admin/Login')->withErrors([
                'email' => 'Invalid email or password',
            ]);
        }
    }

    public function dashboard()
    {
        return view('Admin/dashboard');
    }

    public function products(){
        $rings = Rings::all();
        return view('Admin/products', ['rings'=>$rings]);
    }

    public function addproduct(){
        return view('Admin/addproduct');
    }

    public function submitproduct(Request $request): RedirectResponse
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

    public function productdet($rid){
        $ringdet = Rings::find($rid);
        return view('Admin/productdetails', ['ring' => $ringdet]);
    }

    public function productvardet(Request $request, $rid) {
        $ring = Rings::find($rid);
    
        if (!$ring) {
            return redirect()->back()->withErrors(['error' => 'Ring not found']);
        }
    
        $ringvar = new RingVariants();
        $ringvar->RID = $ring->id; // Store the ring ID
        $ringvar->size = $request->size;
        $ringvar->Stock_quantity = $request->stock;
        
        $ringvar->save();
        
        return redirect('/admin/your_products')->with('success', 'Ring variation added successfully.');
    }
    
    
    public function register() {
        return view('Client/register');
    }

    public function store(Request $request): RedirectResponse {
        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->phone = $request->phone;
        $customer->role = 'Customer';
        $customer->address = $request->address;

        $customer->save();

        return redirect('/admin/your_products');
    }

    public function loginPage()
    {
        return view('Client/login');
    }

    public function login(Request $request) {
        // Validate the form data
        $credentials =  $request->validate([
            'Email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('customer')->attempt($credentials)) {
            $customer = Auth::guard('customer')->user();
            $request->session()->regenerate();
            return redirect('/');

            // Failed login
            return redirect('/login')->withErrors([
                'email' => 'Invalid email or password',
            ]);
        }
    }

    public function homepage()
    {
        return view('Client/homepage');
    }

    public function ringsSection()
    {
        $rings = Rings::all();
        return view('Client/rings', ['rings'=>$rings]);
    }

    public function ringsDetails($rid){
        $ringdet = Rings::find($rid);
        return view('Client/ringdetails', ['ring' => $ringdet]);
    }


    public function logout(User $user) {}
}
