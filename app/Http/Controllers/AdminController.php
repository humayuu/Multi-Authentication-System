<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
     * Function for admin login
     */
    public function AdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput($request->only('email'))
            ->with('error', 'Invalid credentials.');
    }

    /**
     * Function for redirect to admin dashboard
     */
    public function AdminDashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();


        $request->session()->regenerateToken();

        return redirect()->route('admin.login.page');
    }

    /**
     * Function for redirect to admin profile page
     */
    public function AdminProfile()
    {
        return view('admin.profile');
    }

    /**
     * Function for Update Admin Profile detail
     */
    public function AdminProfileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());

        $admin->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Admin Profile Updated Successfully');
    }

    /**
     * Function for Update Admin Password
     */
    public function AdminPasswordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());

        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $admin->update([
            'password' => $request->password,
        ]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    /**
     * Function for fetch all all users
     */
    public function AllUsers()
    {
        $users = User::all();

        return view('admin.all_users', compact('users'));
    }
}