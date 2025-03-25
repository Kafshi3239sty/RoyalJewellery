<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{

    //Admin backend
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

    //End of Admin Backend
    
    //Client Backend
    public function register() {
        return view('Client/register');
    }

    public function store(Request $request): Response {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);
    
        $customer = User::create([
            'name' => $request->name,
            'email' => $request->email, // Ensure this is lowercase
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'Customer',
            'address' => $request->address,
        ]);
    
        // Fire Registered event (this automatically sends email verification)
        event(new Registered($customer));

        Auth::login($customer);
    
        return response()->noContent();
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
        $remember = $request->has('remember'); // Check if Remember Me is checked

        if (Auth::guard('customer')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
            // Failed login
            return redirect('/login')->withErrors([
                'email' => 'Invalid email or password',
            ])->onlyInput('Email');
    }

    public function homepage()
    {
        return view('Client/homepage');
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
} 