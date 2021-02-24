<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey_Responses;


class SurveyController extends Controller
{

    /**
     * This method that will create the form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('survey.create');
    }


    /**
     * This method that will store the response to the form
     */
    public function store()
    {

        //the fields of the table: id, Email, DateCompleted, SurveyName, FirstName, LastName, Responses

        $submittedData = $_POST;

        //remove the first element of the submitted form (the token)
        unset($submittedData["_token"]);

        $responses = [];
        foreach (array_keys($submittedData) as $index) {
            $field = [$index, $submittedData[$index]];
            $responses[] = $field;
        }

        $responses = json_encode($responses);


        //$entry = ["Email" => "email@gmail.com","DateCompleted" => date("Y-m-d"),"SurveyName" => "prom","FirstName" => "test1","LastName" => "test2","Responses" => $responses];

        //TODO get authenticated user's data (email, first and last name)

        $survey_response = new SURVEY_RESPONSES;

        $survey_response->Email = "email3@gmail.com";
        $survey_response->DateCompleted = date("Y-m-d");
        $survey_response->SurveyName = "prom";
        $survey_response->FirstName = "John";
        $survey_response->LastName = "Doe";
        $survey_response->Responses = $responses;

        $survey_response->save();

        echo "Your response has been saved successfully!";
    }
}
