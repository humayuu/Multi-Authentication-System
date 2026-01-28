<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AdminController extends Controller
{
    /**
     * Function for redirect to admin login page
     */
    public function AdminLoginPage()
    {
        return view('admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function AdminLogin(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::guard('admin')->attempt($credentials)) {
            return redirect()->back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login.page');
    }

    /**
     * Function for Redirect to admin dashboard
     */
    public function AdminDashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Function for Redirect to admin profile
     */
    public function AdminProfile($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.profile', compact('admin'));
    }
}