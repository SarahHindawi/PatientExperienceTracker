<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LogoutController extends Controller
{
   

    public function debuglogout(Request $request){
        
           
        //Logout function without page to redirect.
       
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();           
        
        Auth::guard('patient')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //Line to test Patient Auth without implemented Patient Login page.
        //Auth::guard('patient')->attempt(['email' => 'testpatientone@test.ca' , 'password' => 'patientOne']);
         

        return redirect('/');    
    }
}
