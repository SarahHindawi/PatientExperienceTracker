<?php

namespace App\Http\Controllers;

use Auth;

class AdminHelpController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {

            $adminType = Auth::guard('admin')->user()->RootAdmin;
            $adminName = Auth::guard('admin')->user()->FirstName;
            //Conditional for Root Admin Dashboard instead to Admin Dashboard.
            if ($adminType || $adminName) {
                return view('admin_help');
            }
        }
    }

}
