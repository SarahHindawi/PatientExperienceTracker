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
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

    public function create(...$message)
    {
        if (!Auth::guard('admin')->check()) {
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
        if (count($message) == 0) {
            return view('GeneratReport', ["surveys" => $surveyList, "medications" => $medicationList]);
        } else {
            return view('GeneratReport', ["surveys" => $surveyList, "medications" => $medicationList, "message" => $message[0]]);
        }
    }

    public function store()
    {
        if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
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
        $filteredPatients = $queryPatients->where('NewAccount', 'false')->get(["Email", "Medications", "DOB"]);

        $medicationUsage = $_POST["medicationUsage"];

        $matchedPatientsEmails = [];
        $matchedPatientsDOB = [];

        //if the patient selected 'includes medication', then filter patients based on whether they use ANY (union) of the selected medications
        if ($medicationUsage == 'includes' and isset($_POST["medication"])) {

            //returns an array of the selected medications/checkboxes
            $medications = $_POST["medication"];

            //go over each filtered patient from above (to filter them further based on medication usage)
            for ($i = 0; $i < count($filteredPatients); $i++) {

                //encode the whole row ($filteredPatients is an array of the returned rows from the previous database query)
                $row = json_encode($filteredPatients[$i], true);

                $rowArray = json_decode($row, true);

                //remove the first character "[" and last one "]" from the "Medications" column
                $medArray = explode('","', substr($rowArray["Medications"], 1, -1));

                //remove the first character " and last one " for each medication string
                for ($j = 0; $j < count($medArray); $j++) {
                    $medArray[$j] = str_replace("\/", "/", $medArray[$j]);
                }

                $lastIndex = count($medArray) - 1;

                //remove the " in the first string in the array
                $medArray[0] = substr($medArray[0], 1);

                //remove the " in the last string in the array
                $medArray[$lastIndex] = substr($medArray[$lastIndex], 0, -1);

                //check if there are any matches between the medications consumed by this specific patient, and the selected checkboxes
                $intersectionMeds = count(array_intersect($medArray, $medications));

                //if there are any matches, then add this patient's email to the list of $matchedPatientsEmails
                if ($intersectionMeds > 0) {
                    $matchedPatientsEmails[] = $rowArray['Email'];
                    $matchedPatientsDOB[] = $rowArray['DOB'];
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
                    if ($ageYears > $above) {
                        $finalPatients[] = $matchedPatientsEmails[$i];
                    }
                } else if ($age == 'below') {
                    $below = $_POST["ageBelow"];
                    if ($ageYears < $below) {
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
            return $this->create("No records match the specified data.");
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
            return $this->create("No records match the specified data.");
        }

        //Get the questions of the current version of the survey (as column headers)
        $surveyName = $_POST["surveyName"];
        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);

        $responsesAr = [];

        //convert underscore characters to space characters
        for ($i = 0; $i < count($responsesArray); $i++) {
            foreach ($responsesArray[$i] as $key => $value) {
                $question = str_replace("_", " ", $key);
                $responsesAr[$i][$question] = $responsesArray[$i][$key];
            }
        }

        //reformat responses that are stored as arrays to strings
        for ($i = 0; $i < count($responsesAr); $i++) {
            foreach ($responsesAr[$i] as $key => $value) {
                if (is_array($responsesAr[$i][$key])) {
                    $responsesAr[$i][$key] = implode(", ", $responsesAr[$i][$key]);
                }
            }
        }

        //get all the files in the storage/app directory, to remove any old report files
        $files = Storage::allFiles();
        $csvFiles = [];

        for( $i = 0; $i < count($files); $i++){
            //if the name of the file contains the word 'report'
            if (str_contains($files[$i], 'report')){
                $csvFiles[]= $files[$i];
            }
        }
        Storage::delete($csvFiles);


        $header = "Name|Email Address|Date Completed";

        foreach ($surveyArray as $q) {
            $header .= "|" . ($q["Text"]);
        }

        $list = [explode("|", $header)];
        for ($i = 0; $i < count($patientsEmail); $i++) {
            $row = $patientsName[$i] . "|" . $patientsEmail[$i] . "|" . $dateCompleted[$i];
            foreach ($surveyArray as $q) {
                if (array_key_exists($q['Text'], $responsesAr[$i])) {
                    $row .= "|" . $responsesAr[$i][$q['Text']];
                } else {
                    $row .= "|N/A";
                }
            }
            $list[] = explode("|", $row);
        }

        $path = storage_path('app\\');

        $date = new DateTime("now", new \DateTimeZone('America/Halifax'));

        $name = "report[" . $date->format('d-m-Y@H-i-s') . "].csv";

        $file = fopen($path . $name, "w");

        foreach ($list as $line) {
            fputcsv($file, $line);
        }

        //a new CSV file is created in storage/ReportCSVs
        fclose($file);

        return view("report_result_page", ["responses" => $responsesAr, "emails" => $patientsEmail, "names" => $patientsName, "dates" => $dateCompleted, "questions" => $surveyArray, "fileName" => $name]);
    }

    public function download()
    {

        return Storage::download($_POST['fileName']);

    }
}
