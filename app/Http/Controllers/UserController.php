<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Function for Redirect user Register page
     */
    public function UserRegistration()
    {
        return view('register');
    }
}