<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Condition_List;
use App\Models\Medication_List;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;



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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'gender' => 'required',
            'condition' => 'required',            
            'verificationCode' => 'required',           
            ]);        

        $verificationCode = $request->input('verificationCode');

        $existanceTest = Patient::where('Email', $request->input('email'))->first();

        if($existanceTest)
        {
            return redirect('/')->with('message', 'Registration failed, Profile with email already exists.');
        }
        
        if((strcmp($verificationCode, $request->input('code')) !== 0)){
            return view('verification')->with('email', $request->input('email'))->with('password' , $request->input('password'))
            ->with('firstName' , $request->input('firstName'))->with('lastName' , $request->input('lastName'))
            ->with('dob', $request->input('dob'))->with('weight', $request->input('weight'))->with('height', $request->input('height'))
            ->with('gender', $request->input('gender'))->with('condition', $request->input('condition'))->with('medication', $request->input('medication'))
            ->with('verificationCode', $verificationCode)->with('message' , 'Incorrect Verification Code. Please check email.'); 
        }

        $patient = new Patient();

        $conditionElements = Condition_List::where('id', $request -> input('Condition') + 1)->first()->pluck('Condition');
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

        return redirect('/')->with('message', 'Registration has been sent for Administrator review');

    }

    public function emailVerification(Request $request)
    {
        if(Auth::guard('admin')->check()){
            return redirect('/');
        }
        else if(Auth::guard('patient')->check()){

            return redirect(' /');
        }        

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'gender' => 'required',
            'condition' => 'required',            
            ]);
            
        

        $existanceTest = Patient::where('Email', $request->input('email'))->first();

        if($existanceTest)
        {
            return redirect('/')->with('message', 'Registration Failed Email Profile with email already exists.');
        }

        if(($request->input('medication')) === null)
        {
            $medication = array();
        }
        else{
            $medication = $request->input('medication');
        }

        $verificationCode = Str::random(4);             

        $details = [
            'verificationCode' => $verificationCode
        ];

        Mail::to($request->input('email'))->send(new EmailVerification($details));
       
        return view('verification')->with('email', $request->input('email'))->with('password' , $request->input('password'))
        ->with('firstName' , $request->input('firstName'))->with('lastName' , $request->input('lastName'))
        ->with('dob', $request->input('dob'))->with('weight', $request->input('weight'))->with('height', $request->input('height'))
        ->with('gender', $request->input('gender'))->with('condition', $request->input('condition'))->with('medication', $medication)
        ->with('verificationCode', $verificationCode); 
        
    }    
}
