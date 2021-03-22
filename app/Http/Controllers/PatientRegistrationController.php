<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Condition_List;
use App\Models\Medication_List;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class PatientRegistrationController extends Controller 
{
    public function index()
    {

        //Return Redirect to Dashboard if either usertype is logged in.
        if(Auth::guard('admin')->check()){
            return redirect('/');
        }
        else if(Auth::guard('patient')->check()){
            return redirect('/');
        }

        $conditionList = Condition_List::all()->pluck('Condition')->toarray();

        $medicationList = Medication_List::all()->pluck('MedicationName')->toarray();

        return view ('Registration')->with('conditionList' , $conditionList)->with('medicationList', $medicationList);
    }

    public function register(Request $request)
    {
        if(Auth::guard('admin')->check()){            
            return redirect('/');
        }
        else if(Auth::guard('patient')->check()){
            
            return redirect(' /');
        }

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',       
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            'weight' => 'required',
            'height' => 'required',            
            'gender' => 'required',
            'condition' => 'required',
            'medication' => 'required'
            ]);


        $existanceTest = Patient::where('Email', $request->input('email'))->first();

        if($existanceTest)
        {
            
            return redirect('/')->with('message', 'Registration Failed Email Profile with email already exists.');
        }


        $patient = new Patient();

        $conditionElements = Condition_List::where('id', $request -> input('condition') + 1)->first()->pluck('condition');
        $conditionValue = $conditionElements[0];


        $patient->email = $request->input('email');
        $patient->password = Hash::make($request->input('password'));                               
        $patient->FirstName = $request->input('firstName');
        $patient->LastName = $request->input('lastName');
        $patient->DOB = date_create($request->input('dob'));     //dd-mm-yyyy
        $patient->Weight = $request->input('weight');
        $patient->Height = $request->input('height');        
        $patient->Gender = $request->input('gender');
        $patient->Condition = $conditionValue;
        $patient->Medications = json_encode($request->input('medication'));        

        $patient->save();

        //Registration success redirect to homepage with message.          
        
        return redirect('/')->with('message', 'Registration successfully sent for Adminstrator review.'); 

    } 
}
