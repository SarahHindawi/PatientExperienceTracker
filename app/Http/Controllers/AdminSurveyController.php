<?php

namespace App\Http\Controllers;

use App\Models\Survey_Questions;
use Illuminate\Http\Request;
use App\Models\Survey_Responses;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\DB;


class AdminSurveyController extends Controller
{

    public function surveyselection()
    {
        if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        $surveyList = Survey_Questions::select('SurveyName')
            ->pluck('SurveyName');

        return view('select_admin_survey')->with('surveys', $surveyList);
    }


    public function create(Request $request)
    {

        if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
                return redirect('/');
            }
            return redirect('/adminlogin');
        }


        $this->validate($request, [
            'SurveyName' => 'required',
        ]);


        $surveyIndex = $request->input('SurveyName');
        $surveyList = Survey_Questions::select('SurveyName')
            ->pluck('SurveyName');

        //Match the input dropdown index to get the survey name selected.
        $surveyName = $surveyList[$surveyIndex];

        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);


        //convert dot characters to | character
        for ($i = 0; $i < count($surveyArray); $i++) {
            $surveyArray[$i]["Text"] = str_replace(".", "|", $surveyArray[$i]["Text"]);
        }

        return view('surveyAdmin', ["questions" => $surveyArray, "name" => $surveyName]);
    }


    /**
     * This method that will store the response to the form
     */
    public function store(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        $submittedData = $_POST;

        //print_r($_POST);

        //remove the first element of the submitted form (the token)
        unset($submittedData["_token"]);

        $surveyName = $submittedData['surveyname'];
        $patientEmail = $submittedData['email'];

        unset($submittedData["surveyname"]);
        unset($submittedData["email"]);


        //same as $submittedData, but | characters in the questions are converted into dots
        $submittedSurvey = [];

        //convert | characters back to dot characters
        foreach ($submittedData as $question => $answer) {
            $submittedSurvey[str_replace("|", ".", $question)] = $answer;
        }


        $responses = json_encode($submittedSurvey);

        //get patient's information

        $data = DB::table('PATIENT_PROFILE')
            ->where('Email', 'LIKE', "%" . $patientEmail . "%")->first();

        if (is_null($data)) {
            return redirect('/')->with('message', 'Survey was not saved. The provided email address does not match any patients.');
        }

        $firstName = $data->FirstName;
        $lastName = $data->LastName;


        $survey_response = new SURVEY_RESPONSES;

        $survey_response->Email = $patientEmail; //the same email is allowed to submit the same survey only once a day
        $survey_response->DateCompleted = date("Y-m-d");
        $survey_response->SurveyName = $surveyName;
        $survey_response->FirstName = $firstName;
        $survey_response->LastName = $lastName;
        $survey_response->Responses = $responses;

        $survey_response->save();

        return redirect('/')->with('message', 'Responses have been saved successfully.');

    }

}
