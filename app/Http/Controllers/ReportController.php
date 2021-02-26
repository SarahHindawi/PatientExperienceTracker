<?php

namespace App\Http\Controllers;

use App\Models\Survey_Questions;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function create()
    {
        //get a list of the available surveys
        $surveys = Survey_Questions::select('SurveyName')->get();
        $surveyList=[];
        foreach($surveys as $survey){
            $surveyList[]=$survey["SurveyName"];
        }

        return view('GeneratReport',["surveys" => $surveyList]);
    }

    public function store()
    {

        $submittedData = $_POST;
        unset($submittedData["_token"]);

        $responses = [];
        foreach (array_keys($submittedData) as $index) {
            $field = [$index, $submittedData[$index]];
            $responses[] = $field;
        }

        dd($responses);
        $responses = json_encode($responses);
    }
}
