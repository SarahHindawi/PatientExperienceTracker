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
    public function create()
    {

        //Check if Patient is logged in.
        if (!Auth::guard('patient')->check()) {
            if (Auth::guard('admin')->check()) {

                return redirect('/');
            }
            return redirect('/patientlogin');
        }

        //TODO get selected survey name
        $surveyName = "IBDPREM_Two";

        //check whether the patient has already submitted the survey on the same day
        $responses = DB::table('Survey_Responses')
            ->where('Email', 'LIKE', Auth::guard('patient')->user()->email)
            ->where('DateCompleted', 'LIKE', date("Y-m-d"))
            ->where('SurveyName', 'LIKE', $surveyName)->count();

        if ($responses > 0) {
            return redirect('/')->with('message', 'Sorry, you cannot resubmit the survey on the same day.');
        }


        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);

        return view('survey', ["questions" => $surveyArray, "name" => $surveyName]);
    }


    /**
     * This method that will store the response to the form
     */
    public function store()
    {
        if (!Auth::guard('patient')->check()) {
            if (Auth::guard('admin')->check()) {
                //TODO redirect to Admin Dashbaord with unauthorized message.
            }
            return redirect('/patientlogin');
        }

        //the fields of the table: id, Email, DateCompleted, SurveyName, FirstName, LastName, Responses

        $submittedData = $_POST;

        //print_r($_POST);

        //remove the first element of the submitted form (the token)
        unset($submittedData["_token"]);
        $responses = json_encode($submittedData);


        $surveyName = "IBDPREM_One";
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
