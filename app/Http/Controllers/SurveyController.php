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

        //Check if Patient is logged in.
        if(!Auth::guard('patient')->check()){
           if(Auth::guard('admin')->check()){

                return redirect('/');
            }            
            return redirect('/')->with('message', 'No Patient Logged in');
       }
        //Check if password is temporary redirect to password change if so.
        $tempPassCheck = Auth::guard('patient')->user()->PasswordReset;
        if(strcmp($tempPassCheck, "pending")){
            return redirect('/passwordchangepatient')->with('message', 'Temporary password detected please change below.');
        }

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
          //Check if Patient is logged in.
        if(!Auth::guard('patient')->check()){
            if(Auth::guard('admin')->check()){
                return redirect('/');
            }            
            return redirect('/')->with('message', 'No Patient Logged in');
        }

        //Check if password is temporary redirect to password change if so.
        $tempPassCheck = Auth::guard('patient')->user()->PasswordReset;
        if(strcmp($tempPassCheck, "pending")){
            return redirect('/passwordchangepatient')->with('message', 'Temporary password detected please change below.');
        }

        $submittedData = $_POST;

        //print_r($_POST);

        //remove the first element of the submitted form (the token)
        unset($submittedData["_token"]);
        $responses =json_encode($submittedData);


        //TODO get authenticated user's data (email, first and last name), and get the type of the survey

        $survey_response = new SURVEY_RESPONSES;

        $survey_response->Email = "testpatientotwo@test.ca"; //the same email is allowed to submit the same survey only once a day
        $survey_response->DateCompleted = date("Y-m-d");
        $survey_response->SurveyName = "IBDPREM_One";
        $survey_response->FirstName = "John";
        $survey_response->LastName = "Doe";
        $survey_response->Responses = $responses;

        $survey_response->save();

        return "Thank you for submitting the survey!";
    }
}
