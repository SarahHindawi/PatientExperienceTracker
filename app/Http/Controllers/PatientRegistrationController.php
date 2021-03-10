<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Condition_List;
use App\Models\Medication_List;

class PatientRegistrationController extends Controller
{
    public function index()
    {
        $conditionList = Condition_List::all()->pluck('Condition')->toarray();

        $medicationList = Medication_List::all()->pluck('MedicationName')->toarray();

        return view ('Registration.PatientRegistration')->with('conditionList' , $conditionList)->with('medicationList', $medicationList);
    }

    public function register(Request $request)
    {


        $this->validate($request, [
            'email' => 'required',
            //'password' => 'required',       //TODO impletement password hashing when authentication is implemented.
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            'weight' => 'required',
            'heightFeet' => 'required',
            'heightInches' =>'required',
            'gender' => 'required',
            'condition' => 'required',
            'medication' => 'required'
            ]);


        $existanceTest = Patient::where('Email', $request->input('email'))->first();

        if($existanceTest)
        {
            //TODO Replace with redirect to homepage with error message when homepage is complete.
            return "Registration Failure: Patient already exists.";
        }


        $patient = new Patient();

        $conditionElements = Condition_List::where('id', $request -> input('condition') + 1)->first()->pluck('condition');
        $conditionValue = $conditionElements[0];


        $patient->Email = $request->input('email');
        $patient->Password = '';                                 //TODO impletement password hashing when authentication is implemented.
        $patient->FirstName = $request->input('firstName');
        $patient->LastName = $request->input('lastName');
        $patient->DOB = date_create($request->input('dob'));     //dd-mm-yyyy
        $patient->Weight = $request->input('weight');
        $patient->HeightFeet = $request->input('heightFeet');
        $patient->HeightInches = $request->input('heightInches');
        $patient->Gender = $request->input('gender');
        $patient->Condition = $conditionValue;
        $patient->Medications = json_encode($request->input('medication'));

        $patient->save();

        //TODO Replace with redirect to Non-Logged in homepage with success message when implemented.
        return 'success';

    }
}
