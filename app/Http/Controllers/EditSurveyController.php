<?php

namespace App\Http\Controllers;

use App\Models\Survey_Questions;
use App\Models\Survey_Responses;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class EditSurveyController extends Controller
{

    public function create()
    {

         //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
         if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                 //If Patient logged in Redirect to Patient Dashboard.
                 return redirect('/');
            }
            return redirect('/adminlogin');
        }     

        $surveyName = "IBDPREM_One";
        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);
        return view('EditSurvey', ["questions" => $surveyArray]);
    }

    /**
     * The method that will update the survey with the new additions and deletions
     */
    public function store()
    {
    }
}
