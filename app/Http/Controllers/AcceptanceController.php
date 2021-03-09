<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;

class AcceptanceController extends Controller
{
    public function create()
    {
        //get a list of the newly registered patients
        $newPatients = Patient::select(['FirstName', 'LastName', 'Email'])->where("NewAccount", true)->get();

        $newPatientsInfo = [];
        for ($i = 0; $i < count($newPatients); $i++) {
            $patient = $newPatients->all()[$i]->toArray();
            $patient = $patient["FirstName"] . " " . $patient["LastName"] . " (" . $patient["Email"] . ")";
            $newPatientsInfo[] = $patient;
        }

        //pass the list of new patients to be displayed in the list
        return view('PatientsAcceptance', ["patients" => $newPatientsInfo]);
    }

    public function store()
    {

        $submittedData = $_POST['data'];
        unset($submittedData["_token"]);

        $accepted = [];
        $removed = [];

        //iterate over each returned element in the form, and check whether this patient was accepted or removed
        foreach ($submittedData as $key => $value) {
            $email = explode(" ", $key)[2];
            if ($value == "Accept") {
                $accepted[] = substr($email, 1, -1);

            } else {
                $removed[] = substr($email, 1, -1);
            }
        }


        //for each accepted patient, change the value of its corresponding "New Account" attribute to false
        foreach ($accepted as $acceptedEmail) {
            Patient::where('Email', $acceptedEmail)->update(array('NewAccount' => false));
        }

        foreach ($removed as $removedEmail) {
            Patient::where('Email', '=', $removedEmail)->delete();
        }


        //TODO create a Dashboard view and return it
        return view("Welcome");

    }
}