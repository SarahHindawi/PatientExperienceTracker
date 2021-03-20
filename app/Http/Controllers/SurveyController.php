<?php

namespace App\Http\Controllers;

use App\Models\Survey_Questions;
use Illuminate\Http\Request;
use App\Models\Survey_Responses;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;


class SurveyController extends Controller
{

    /**
     * This method that will create the form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
//
//        //Check if Patient is logged in.
//        if(!Auth::guard('patient')->check()){
//            if(Auth::guard('admin')->check()){
//
//                return redirect('/');
//            }
//            //TODO Redirect to PAtient Login Page.
//            return 'Patient not logged in.';
//            //return redirect('/patientlogin');
//        }

        //TODO get selected survey name
        $surveyName = "IBDPREM_One";
        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);
        return view('survey', ["questions" => $surveyArray]);
    }


    /**
     * This method that will store the response to the form
     */
    public function store()
    {
        if(!Auth::guard('patient')->check()){
            if(Auth::guard('admin')->check()){
                //TODO redirect to Admin Dashbaord with unauthorized message.
            }
            return redirect('/patientlogin');
        }

        //the fields of the table: id, Email, DateCompleted, SurveyName, FirstName, LastName, Responses

        $submittedData = $_POST;

        //print_r($_POST);

        //remove the first element of the submitted form (the token)
        unset($submittedData["_token"]);
        $responses =json_encode($submittedData);


        //TODO get authenticated user's data (email, first and last name), and get the type of the survey

        $survey_response = new SURVEY_RESPONSES;

        $survey_response->Email = "testpatientOne@test.ca"; //the same email is allowed to submit the same survey only once a day
        $survey_response->DateCompleted = date("Y-m-d");
        $survey_response->SurveyName = "IBDPREM_One";
        $survey_response->FirstName = "John";
        $survey_response->LastName = "Doe";
        $survey_response->Responses = $responses;

        $survey_response->save();

        return view("Thank you for submitting the survey!");
    }
}
