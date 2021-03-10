<?php

namespace App\Http\Controllers;

use App\Models\Survey_Questions;
use App\Models\Survey_Responses;
use Illuminate\Http\Request;

class EditSurveyController extends Controller
{

    public function create()
    {
        $surveyName = "IBDPREM_One";
        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);
        return view('ModifyingSurveys', ["questions" => $surveyArray]);
    }

    /**
     * The method that will update the survey with the new additions and deletions
     */
    public function store()
    {
    }
}
