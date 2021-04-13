<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientRegAccept;

class AcceptanceController extends Controller
{
    public function create()
    {

//         //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
         if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                 //If Patient logged in Redirect to Patient Dashboard.
                 return redirect('/');
            }
            return redirect('/adminlogin');
        }

        //get a list of the newly registered patients
        $newPatients = Patient::select(['FirstName', 'LastName', 'Email'])->where("NewAccount", true)->get();

        $newPatientsInfo = [];
        for ($i = 0; $i < count($newPatients); $i++) {
            $patient = $newPatients->all()[$i]->toArray();
            $patient = $patient["FirstName"] . " " . $patient["LastName"] . " (" . $patient["Email"] . ")";
            $newPatientsInfo[] = $patient;
        }

        //pass the list of new patients to be displayed in the list
        return view('new_patient_registeration', ["patients" => $newPatientsInfo]);
    }

    public function store()
    {

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
         if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                 //If Patient logged in Redirect to Patient Dashboard.
                 return redirect('/');
            }
            return redirect('/adminlogin');
        }

        if (!isset($_POST['data'])) {
            return view("Admin_dashboard_page");
        }


        $submittedData = $_POST['data'];
        unset($submittedData["_token"]);

        //dd($submittedData);

        $accepted = [];
        $removed = [];

        //iterate over each returned element in the form, and check whether this patient was accepted or removed
        foreach ($submittedData as $key => $value) {
            $email = substr(explode(" (", $key)[1],0,-1);
            if ($value == "Accept") {
                $accepted[] = $email;
            } else {
                $removed[] = $email;
            }
        }


        //for each accepted patient, change the value of its corresponding "New Account" attribute to false
        foreach ($accepted as $acceptedEmail) {
            Patient::where('Email', $acceptedEmail)->update(array('NewAccount' => false));


            Mail::to($acceptedEmail)->send(new PatientRegAccept());

        }

        foreach ($removed as $removedEmail) {
            Patient::where('Email', '=', $removedEmail)->delete();
        }

        return redirect('/');
    }
}
