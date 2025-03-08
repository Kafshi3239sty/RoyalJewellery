<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
            return redirect('/admin/dashboard');

            // Failed login
            return redirect('/admin/Login')->withErrors([
                'email' => 'Invalid email or password',
            ]);
        }
    }

    public function dashboard()
    {
        return view('Admin/dasboard');
    }

    public function homepage()
    {
        return view('Client/homepage');
    }

    public function ringsSection()
    {
        return view('Client/rings');
    }

    public function register() {}

    public function store(User $user) {}

    public function login(User $user) {}

    public function logout(User $user) {}
}
