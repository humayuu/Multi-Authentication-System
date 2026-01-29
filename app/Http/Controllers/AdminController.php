<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    /**
     * Function for admin profile update
     */
    public function ProfileUpdate(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:100',
            'email' => 'required|email|string',
        ]);

        $admin = Admin::findOrFail($id);

        if (!empty($request->current_password)) {
            $request->validate([
                'new_password' => 'required|confirmed:confirm_password',
            ]);

            $password = $request->new_password;
        } else {
            $password = $admin->password;
        }


        DB::beginTransaction();;
        try {
            $admin->update([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => $password,
            ]);

            DB::commit();

            return redirect()->route('admin.dashboard')->with('success', 'Profile updated Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Error in Update Profile " . $e->getMessage());
            return redirect()->back()->with('error', 'Profile update failed');
        }
    }
}
