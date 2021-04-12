<?php

namespace App\Http\Controllers;

use App\Models\PatientReport;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;


class PatientProfileSummaryController extends Controller
{
    public function index()
    {

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if (!Auth::guard('admin')->check()) {

            if (Auth::guard('patient')->check()) {
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        $data = Patient::paginate(10);

        return view('ProfileSummary')->with('data', $data);
    }

    public function search(Request $request)
    {
        if (!Auth::guard('admin')->check()) {

            if (Auth::guard('patient')->check()) {
                //TODO redirect to Patient Dashbaord with unauthorized message.
            }
            return redirect('/adminlogin');
        }

        $this->validate($request, [
            'inputEmail' => 'required|email',
        ]);


        $data = DB::table('PATIENT_PROFILE');
        if (!empty($request->inputEmail)) {
            if ($request->inputEmail) {
                $data = $data->where('Email', 'LIKE', "%" . $request->inputEmail . "%")->where('NewAccount', 'false')->get();
            }
        }


        //if there are no registered patients with the given name/email
        if (count($data) == 0) {
            return view('ProfileSummary', ['message' => "No records match the specified data."]);
        }

        $data = (array)$data[0];

        //if the patient uses any medications
        if (strlen($data["Medications"]) > 4) {

            //create a string of the medications (instead of an array)remove the first character "[" and last one "]" from the "Medications" column
            $medArray = explode(",", substr($data["Medications"], 1, -1));

            //remove the first character " and last one " for each medication string
            for ($j = 0; $j < count($medArray); $j++) {
                $medArray[$j] = str_replace("\\", "", substr($medArray[$j], 1, -1));
            }
        }

        $responses = DB::table('Survey_Responses');

        $responses = $responses->where('Email', 'LIKE', "%" . $request->inputEmail . "%")->get();

        $responses = (array)$responses->toArray();

        //if the patient has not submitted any surveys yet
        if (count($responses) == 0 & isset($medArray)) {
            return view('PatientSummaryResult', ["Summary" => $data, "medications" => implode(", ", $medArray)]);
        } //if the patient has not submitted any surveys yet and does not use any medications
        elseif (count($responses) == 0 & !isset($medArray) == 0) {
            return view('PatientSummaryResult', ["Summary" => $data]);
        }

        if (isset($medArray)) {
            $medArray = implode(", ", $medArray);
        }

        //convert Stdclass to array
        for ($i = 0; $i < count($responses); $i++) {
            $responses[$i] = json_decode(json_encode($responses[$i]), true);
        }


        $responsesArray = [];
        for ($i = 0; $i < count($responses); $i++) {
            $responsesArray[] = json_decode($responses[$i]["Responses"], true);
        }

        $dateCompleted = [];
        $surveyName = [];

        //get date completed and survey type for each submitted survey
        for ($i = 0; $i < count($responses); $i++) {
            $dateCompleted[] = $responses[$i]["DateCompleted"];
            $surveyName[] = $responses[$i]["SurveyName"];
        }

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

        $responsesString = [];
        //convert responses array to string
        for ($i = 0; $i < count($responsesAr); $i++) {
            $res = "";
            $quesNum = 1;
            foreach ($responsesAr[$i] as $key => $value) {
                $res .= $quesNum . ") " . $key . ":: " . $value . "| ";
                $quesNum += 1;
            }
            $responsesString[] = $res;
        }

        if (isset($medArray) and count($responsesString) > 0) {
            return view('PatientSummaryResult', ["Summary" => $data, "medications" => $medArray, "responses" => $responsesString, "dates" => $dateCompleted, "names" => $surveyName]);
        } else if (isset($medArray) and count($responsesString) == 0) {
            return view('PatientSummaryResult', ["Summary" => $data, "medications" => $medArray]);
        } else if (!isset($medArray) and count($responsesString) > 0) {
            return view('PatientSummaryResult', ["Summary" => $data, "responses" => $responsesString, "dates" => $dateCompleted, "names" => $surveyName]);
        } else {
            return view('PatientSummaryResult', ["Summary" => $data,]);
        }
    }

    public function nameSearch(Request $request)
    {
        if (!Auth::guard('admin')->check()) {

            if (Auth::guard('patient')->check()) {
                //TODO redirect to Patient Dashbaord with unauthorized message.
            }
            return redirect('/adminlogin');
        }

        $this->validate($request, [
            'inputFirstName' => '',
            'inputLastName' => '',
        ]);


        $data = DB::table('PATIENT_PROFILE');
        if (!empty($request->inputFirstName)) {
            if ($request->inputFirstName) {
                $data = $data->where('FirstName', 'LIKE', "%" . $request->inputFirstName . "%");
            }
        }
        if (!empty($request->inputLastName)) {
            if ($request->inputLastName) {
                $data = $data->where('LastName', 'LIKE', "%" . $request->inputLastName);
            }
        }


        $data = $data->where('NewAccount', 'true')->get()->toArray();

        //if there are no registered patients with the given name
        if (count($data) == 0) {
            return view('ProfileSummary', ['message' => "No records match the specified data."]);
        }

        //an array of arrays (each element represents a patient, with an array of the patient's info)
        $patients = [];
        $age = [];
        for ($i = 0; $i < count($data); $i++) {
            $row = json_encode($data[$i], true);
            $rowArray = json_decode($row, true);
            $patients[] = $rowArray;
            $date = strtotime($rowArray["DOB"]);
            $now = time();
            $diff = abs($date - $now);
            $ageYears = floor($diff / (365 * 60 * 60 * 24));
            $age[] = $ageYears;
        }

        return view('ReportSearchByName', ["data" => $patients, "age" => $age]);
    }

}
