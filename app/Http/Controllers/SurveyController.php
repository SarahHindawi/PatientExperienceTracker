<?php

namespace App\Http\Controllers;

use App\Models\Survey_Questions;
use Illuminate\Http\Request;
use App\Models\Survey_Responses;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\DB;


class SurveyController extends Controller
{

    /**
     * This method that will create the form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function surveyselection()
    {

        //Check if Patient is logged in.
        if (!Auth::guard('patient')->check()) {
            if (Auth::guard('admin')->check()) {

                return redirect('/');
            }
            return redirect('/')->with('message', 'No Patient Logged in');
        }
        //Check if password is temporary redirect to password change if so.
        $tempPassCheck = Auth::guard('patient')->user()->PasswordReset;
        if ((strcmp($tempPassCheck, "pending")) === 0) {
            return redirect('/passwordchangepatient')->with('message', 'Temporary password detected please change below.');
        }


        //Check Condition and only provide survey names that serve the authenticaticated users condition
        $userCondition = Auth::guard('patient')->user()->Condition;

        $surveyList = Survey_Questions::select('SurveyName')
            ->where('ConditionServed', $userCondition)
            ->pluck('SurveyName');

        return view('survey_select')->with('surveys', $surveyList);
    }


    public function create(Request $request)
    {

        //Check if Patient is logged in.
        if (!Auth::guard('patient')->check()) {
            if (Auth::guard('admin')->check()) {

                return redirect('/');
            }
            return redirect('/')->with('message', 'No Patient Logged in');
        }
        //Check if password is temporary redirect to password change if so.
        $tempPassCheck = Auth::guard('patient')->user()->PasswordReset;
        if ((strcmp($tempPassCheck, "pending")) === 0) {
            return redirect('/passwordchangepatient')->with('message', 'Temporary password detected please change below.');

        }

        $this->validate($request, [
            'surveyName' => 'required',
        ]);

        //Check Condition and only provide survey names that serve the authenticaticated users condition.
        $userCondition = Auth::guard('patient')->user()->Condition;

        $surveyIndex = $request->input('surveyName');
        $surveyList = Survey_Questions::select('SurveyName')
            ->where('ConditionServed', $userCondition)
            ->pluck('SurveyName');

        //Match the input dropdown index to get the survey name selected.
        $surveyName = $surveyList[$surveyIndex];


        //check whether the patient has already submitted the survey on the same day
        $responses = DB::table('Survey_Responses')
            ->where('Email', 'LIKE', Auth::guard('patient')->user()->email)
            ->where('DateCompleted', 'LIKE', date("Y-m-d"))
            ->where('SurveyName', 'LIKE', $surveyName)->count();

        if ($responses > 0) {
            return redirect('/')->with('message', 'Sorry, you cannot resubmit the same survey on the same day');
        }


        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);


        //convert dot characters to | character
        for ($i = 0; $i < count($surveyArray); $i++) {
            $surveyArray[$i]["Text"] = str_replace(".", "|", $surveyArray[$i]["Text"]);
        }

        return view('survey', ["questions" => $surveyArray, "name" => $surveyName]);
    }


    /**
     * This method that will store the response to the form
     */
    public function store()
    {
        //Check if Patient is logged in.
        if (!Auth::guard('patient')->check()) {
            if (Auth::guard('admin')->check()) {
                return redirect('/');
            }
            return redirect('/')->with('message', 'No Patient Logged in');
        }

        //Check if password is temporary redirect to password change if so.
        $tempPassCheck = Auth::guard('patient')->user()->PasswordReset;
        if ((strcmp($tempPassCheck, "pending")) === 0) {
            return redirect('/passwordchangepatient')->with('message', 'Temporary password detected please change below.');
        }

        //the fields of the table: id, Email, DateCompleted, SurveyName, FirstName, LastName, Responses


        $submittedData = $_POST;

        //print_r($_POST);

        //remove the first element of the submitted form (the token)
        unset($submittedData["_token"]);

        $surveyName = $submittedData['surveyname'];

        unset($submittedData["surveyname"]);

        //same as $submittedData, but | characters in the questions are converted into dots
        $submittedSurvey = [];

        //convert | characters back to dot characters
        foreach ($submittedData as $question => $answer) {
            $submittedSurvey[str_replace("|", ".", $question)] = $answer;
        }

        $submittedSurveyAr = [];

        //remove empty text area responses
        foreach ($submittedSurvey as $question => $answer) {
            if ((is_string($answer) and strlen($answer) > 0) or !is_string($answer)) {
                $submittedSurveyAr[$question] = $answer;
            }
        }

        $responses = json_encode($submittedSurveyAr);

        $firstName = Auth::guard('patient')->user()->FirstName;
        $lastName = Auth::guard('patient')->user()->LastName;
        $email = Auth::guard('patient')->user()->email;


        $survey_response = new SURVEY_RESPONSES;

        $survey_response->Email = $email; //the same email is allowed to submit the same survey only once a day
        $survey_response->DateCompleted = date("Y-m-d");
        $survey_response->SurveyName = $surveyName;
        $survey_response->FirstName = $firstName;
        $survey_response->LastName = $lastName;
        $survey_response->Responses = $responses;

        $survey_response->save();

        return redirect('/')->with('message', 'Thank you for submitting the survey!');

    }
}
