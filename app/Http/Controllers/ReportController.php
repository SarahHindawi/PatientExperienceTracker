<?php

namespace App\Http\Controllers;

use App\Models\Medication_List;
use App\Models\Survey_Questions;
use App\Models\Survey_Responses;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function create()
    {
        //get a list of the available surveys
        $surveys = Survey_Questions::select('SurveyName')->get();
        $surveyList = [];
        foreach ($surveys as $survey) {
            $surveyList[] = $survey["SurveyName"];
        }

        //get a list of the available medications
        $medications = Medication_List::select('MedicationName')->orderBy('MedicationName')->get();
        $medicationList = [];
        foreach ($medications as $medication) {
            $medicationList[] = $medication["MedicationName"];
        }


        //pass the list of survey names and medications to the view be displayed in the form
        return view('GeneratReport', ["surveys" => $surveyList, "medications" => $medicationList]);
    }

    public function store()
    {
        $submittedData = $_POST;
        unset($submittedData["_token"]);


        //finding the patients that match the given filters

        $queryPatients = DB::table('Patient_Profile');

        $gender = $_POST["gender"];

        if ($gender != 'any') {
            $queryPatients->where('Gender', 'LIKE', $_POST["gender"]);
        }


        $weight = $_POST["weight"];

        if ($weight == 'above') {
            $queryPatients->where('Weight', '>', $_POST["weightAbove"]);
        } else if ($weight == 'below') {
            $queryPatients->where('Weight', '<', $_POST["weightBelow"]);
        } else if ($weight == 'equals') {
            $queryPatients->where('Weight', '=', $_POST["weightEquals"]);
        }


        $height = $_POST["height"];

        if ($height == 'above') {
            $queryPatients->where('HeightInches', '>', $_POST["heightAbove"]);
        } else if ($height == 'below') {
            $queryPatients->where('HeightInches', '<', $_POST["heightBelow"]);
        } else if ($height == 'equals') {
            $queryPatients->where('HeightInches', '=', $_POST["heightEquals"]);
        }

        $filteredPatients = $queryPatients->get(["Email", "Medications", "DOB"]);


        $medicationUsage = $_POST["medicationUsage"];

        $matchedPatients = [];

        if ($medicationUsage == 'includes') {

            //returns an array of the selected medications/boxes
            $medications = $_POST["medication"];

            for ($i = 0; $i < count($filteredPatients); $i++) {


                //encode the whole row ($filteredPatients is an array of the returned rows from the database)
                $row = json_encode($filteredPatients[$i], true);
                $rowArray = json_decode($row, true);
                //remove the first character "[" and last one "]"
                $medArray = explode(",", substr($rowArray["Medications"], 1, -1));

                //remove the first character " and last one " for each medication string
                for ($j = 0; $j < count($medArray); $j++) {
                    $medArray[$j] = substr($medArray[$j], 1, -1);
                }

                //check if there are any matches
                $intersectionMeds = count(array_intersect($medArray, $medications));

                $date = date('Y-m-d', strtotime($rowArray['DOB']));

                //TODO check age: $age = date_diff($date, date("Y-m-d"));

                if ($intersectionMeds > 0) {
                    $matchedPatients[] = $rowArray['Email'];
                }
            }
        }

        //Get the responses of the patients that match the required filters
        $query = DB::table('Survey_Responses')
            ->where('SurveyName', "LIKE", $_POST["surveyName"])
            ->wherein('Email', $matchedPatients)
            ->get();


        $responses = json_decode($query, true);

        $responsesArray = [];
        for ($i = 0; $i < count($responses); $i++) {
            $responsesArray[] = json_decode($responses[$i]["Responses"], true);
        }

        return view("ReportResults", ["responses" => $responsesArray]);
    }
}
