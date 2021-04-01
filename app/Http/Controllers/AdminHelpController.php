<?php

namespace App\Http\Controllers;

use Auth;

class AdminHelpController extends Controller
{
    public function index()
    {
//        if (!Auth::guard('admin')->check()) {
//            if (Auth::guard('patient')->check()) {
//                return redirect('/');
//            }
        return view('admin_help');
//        }
//    }
    }
}
