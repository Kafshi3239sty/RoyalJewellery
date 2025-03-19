<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse {
        $customer = new User();
        $customer->id = $request->id;
        $customer->name = $request->name;
        $customer->email = $request->Email;
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;
        $customer->role = 'Customer';
        $customer->address = $request->address;

        $customer->save();

        event(new Registered($customer));

        return redirect('/login');
    }

    public function emailNotice(){
        return view('Client/verify-email');
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
            return redirect()->intended('/');

            // Failed login
            return redirect('/login')->withErrors([
                'email' => 'Invalid email or password',
            ])->onlyInput('Email');
        }
    }

    public function homepage()
    {
        return view('Client/homepage');
    }


    public function logout(User $user) {}

    //End of Client backend
}
