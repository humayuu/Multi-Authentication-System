<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Function for Redirect to admin login page
     */
    public function AdminLoginPage()
    {
        return view('admin.login');
    }

    /**
     * Function for Admin login
     */
    public function AdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {
            if (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                return redirect()->route('admin.dashboard')
                    ->with('success', "Admin Login Successfully");
            }

            return redirect()->back()->with('error', 'Invalid Email or Password');
        } catch (Exception $e) {
            Log::error("Error in Admin login: " . $e->getMessage());
            return redirect()->back()->with('error', 'Admin login Error');
        }
    }

    /**
     * Function for redirect to admin dashboard
     */
    public function AdminDashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Function for Admin Logout
     */
    public function AdminLogout()
    {
        try {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login.page')->with('success', 'Admin logout Successfully');
        } catch (Exception $e) {
            Log::error('Admin Logout error', $e->getMessage());
            return redirect()->back()->with('error', 'Error in Admin logout');
        }
    }
}