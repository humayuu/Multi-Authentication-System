<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Function for Redirect user Register page
     */
    public function UserRegistration()
    {
        return view('register');
    }

    /**
     * Function for Redirect user Login page
     */
    public function UserLoginPage()
    {
        return view('login');
    }

    /**
     * Function for User Register
     */
    public function UserStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);


        DB::beginTransaction();

        try {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            DB::commit();

            return redirect()->route('user.login')->with('success', 'User Register Successfully');
        } catch (Exception $e) {
            DB::rollBack();

            Log::error("Error in User Register ", $e->getMessage());

            return redirect()->back()->with('error', 'User Registration Failed');
        }
    }

    /**
     * Function for User LoggedIn
     */
    public function UserLoggedIn(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        try {
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->back()->with('error', 'Invalid email or password');
            }
            return redirect()->route('user.dashboard')->with('success', 'User login Successfully');
        } catch (Exception $e) {
            Log::error("Error in User Register ", $e->getMessage());

            return redirect()->back()->with('error', 'User login Error');
        }
    }

    /**
     * Function for Redirect user dashboard
     */
    public function UserDashboard()
    {
        return view('dashboard');
    }

    /**
     * Function for User Logout
     */
    public function UserLogout()
    {
        try {
            Auth::logout();
            return redirect()->route('user.login')->with('success', 'User logout Successfully');
        } catch (Exception $e) {
            Log::error('User Logout error', $e->getMessage());
            return redirect()->back()->with('error', 'Error in User logout');
        }
    }
}