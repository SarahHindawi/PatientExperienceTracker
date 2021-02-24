<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view ('AdminLogin');
    }

    public function login(Request $request)
    {


        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);


        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {

            return back()->with('status', 'Invalid login details');
        }

        return 'success';

    }

}
