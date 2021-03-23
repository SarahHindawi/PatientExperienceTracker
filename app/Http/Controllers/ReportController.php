<?php

namespace App\Http\Controllers;

use App\Models\Medication_List;
use App\Models\Survey_Questions;
use App\Models\Survey_Responses;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use Illuminate\Http\Request;
use \Datetime;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class ReportController extends Controller
{

    public function create()
    {
        if (!Auth::guard('admin')->check()){           
            if (Auth::guard('patient')->check()) { 
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

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

        //pass the list of survey names and medications to the view be displayed in the form (to be listed in the drop-down menus)
        return view('GeneratReport', ["surveys" => $surveyList, "medications" => $medicationList]);
    }

    public function store()
    {
        if (!Auth::guard('admin')->check()) {
            if(Auth::guard('patient')->check()){
                return redirect(' /');           
            }
            return redirect('/adminlogin');
        }

        $submittedData = $_POST;
        unset($submittedData["_token"]);

        //finding the patients that match the given filters

        //create a query to filter patients from the Patient-Profile table
        $queryPatients = DB::table('Patient_Profile');

        //get the selected gender option from the survey's response
        $gender = $_POST["gender"];

        //if a specific gender is selected (not any), then filter the patients based on the selected option
        if ($gender != 'all') {
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
            $queryPatients->where('Height', '>', $_POST["heightAbove"]);
        } else if ($height == 'below') {
            $queryPatients->where('Height', '<', $_POST["heightBelow"]);
        } else if ($height == 'equals') {
            $queryPatients->where('Height', '=', $_POST["heightEquals"]);
        }

        //get the email, medications, and date of birth of the filtered patients
        $filteredPatients = $queryPatients->get(["Email", "Medications", "DOB"]);


        $medicationUsage = $_POST["medicationUsage"];

        $matchedPatientsEmails = [];
        $matchedPatientsDOB = [];

        //if the patient selected 'includes medication', then filter patients based on whether they use any of the selected medications
        if ($medicationUsage == 'includes') {

            //returns an array of the selected medications/checkboxes
            $medications = $_POST["medication"];

            //go over each filtered patient from above (to filter them further based on medication usage)
            for ($i = 0; $i < count($filteredPatients); $i++) {

                //encode the whole row ($filteredPatients is an array of the returned rows from the previous database query)
                $row = json_encode($filteredPatients[$i], true);

                $rowArray = json_decode($row, true);

                //remove the first character "[" and last one "]" from the "Medications" column
                $medArray = explode(",", substr($rowArray["Medications"], 1, -1));

                //remove the first character " and last one " for each medication string
                for ($j = 0; $j < count($medArray); $j++) {
                    $medArray[$j] = substr($medArray[$j], 1, -1);
                }

                //check if there are any matches between the medications consumed by this specific patient, and the selected checkboxes
                $intersectionMeds = count(array_intersect($medArray, $medications));

                //if there are any matches, then add this patient's email to the list of $matchedPatientsEmails
                if ($intersectionMeds > 0) {
                    $matchedPatientsEmails[] = $rowArray['Email'];
                    $matchedPatientsDOB[] = $rowArray['DOB'];
                } else {
                    unset($filteredPatients[$i]);
                }
            }
        } else {

            //if no filtering based on medications is required "None", then get all the previously filtered patients
            for ($i = 0; $i < count($filteredPatients); $i++) {
                $row = json_encode($filteredPatients[$i], true);
                $rowArray = json_decode($row, true);
                $matchedPatientsEmails[] = $rowArray['Email'];
                $matchedPatientsDOB[] = $rowArray['DOB'];

            }
        }

        $finalPatients = [];

        //filter based on age
        $age = $_POST["age"];

        if ($age == 'all') {
            $finalPatients = $matchedPatientsEmails;
        } else {
            for ($i = 0; $i < count($matchedPatientsEmails); $i++) {

                //convert DOB to unix time in seconds
                $date = strtotime($matchedPatientsDOB[$i]);
                $now = time();
                $diff = abs($date - $now);
                $ageYears = floor($diff / (365 * 60 * 60 * 24));

                if ($age == 'above') {
                    $above = $_POST["ageAbove"];

                    //get all the patients that are older or have the same age as the one specified
                    if ($ageYears >= $above) {
                        $finalPatients[] = $matchedPatientsEmails[$i];
                    }
                } else if ($age == 'below') {
                    $below = $_POST["ageBelow"];
                    if ($ageYears <= $below) {
                        $finalPatients[] = $matchedPatientsEmails[$i];
                    }
                } else if ($age == 'equals') {
                    $equals = $_POST["ageEquals"];
                    if ($ageYears == $equals) {
                        $finalPatients[] = $matchedPatientsEmails[$i];
                    }
                }
            }
        }

        if (count($finalPatients) == 0) {
            echo '<script type="text/javascript">alert("No records match the specified data.")</script>';
            return $this->create();
        }

        //Get the responses of the patients that match the required filters
        $query = DB::table('Survey_Responses')
            ->where('SurveyName', "LIKE", $_POST["surveyName"])
            ->wherein('Email', $finalPatients)
            ->get();


        $responses = json_decode($query, true);

        //an array of arrays of strings (an array of records from the Survey_Responses table, which store attributes are Strings)
        $responsesArray = [];

        //an array of emails of the selected patients
        $patientsEmail = [];
        $patientsName = [];
        $dateCompleted = [];


        for ($i = 0; $i < count($responses); $i++) {
            $responsesArray[] = json_decode($responses[$i]["Responses"], true);
            $patientsEmail[] = $responses[$i]["Email"];
            $dateCompleted[] = $responses[$i]["DateCompleted"];
            $patientsName[] = $responses[$i]["FirstName"] . " " . $responses[$i]["LastName"];
        }

        if (count($patientsName) == 0) {
            echo '<script type="text/javascript">alert("No records match the specified data.")</script>';
            return $this->create();
        }


//        for ($i = 0; $i< count($patientEmail); $i++) {
//            $query = DB::table('Patient_Profile')
//            ->where('Email', "LIKE", $patientEmail[$i])
//            ->get();
//        }

        //Get the questions of the current version of the survey (as column headers)
        //TODO get selected survey name
        $surveyName = $_POST["surveyName"];
        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);


        //convert underscore characters to space characters
        for ($i = 0; $i < count($responsesArray); $i++) {
            foreach ($responsesArray[$i] as $key => $value) {
                $question = str_replace("_", " ", $key);
                $responsesArray[$i][$question] = $responsesArray[$i][$key];
                unset($responsesArray[$i][$key]);
            }
        }

        //reformat responses that are stored as arrays to strings
        for ($i = 0; $i < count($responsesArray); $i++) {
            foreach ($responsesArray[$i] as $key => $value) {
                if (is_array($responsesArray[$i][$key])) {
                    $responsesArray[$i][$key] = implode(", ", $responsesArray[$i][$key]);
                }
            }
        }

        return view("report_result_page", ["responses" => $responsesArray, "emails" => $patientsEmail, "names" => $patientsName, "dates" => $dateCompleted, "questions" => $surveyArray]);
    }
}
