<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LogoutController extends Controller
{
   

    public function logout(Request $request){
        
           
        //Logout function or either user type. All usertypes logged out by this function.
       
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();           
        
        Auth::guard('patient')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();          

        return redirect('/');    
    }
}
