<?php

namespace App\Http\Controllers;

use App\Models\Survey_Questions;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class EditSurveyController extends Controller
{

    public function surveyselection()
    {

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if (!Auth::guard('admin')->check()) {

            if (Auth::guard('patient')->check()) {
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        //get a list of all survey names to be displayed as a dropdown list
        $surveyList = Survey_Questions::select('SurveyName')->pluck('SurveyName');

        return view('survey_select_edit', ["surveys" => $surveyList]);
    }

    public function create(Request $request)
    {
        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if (!Auth::guard('admin')->check()) {

            if (Auth::guard('patient')->check()) {
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        $this->validate($request, [
            'SurveyName' => 'required',
        ]);

        $surveyName = $request->input('SurveyName');


        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);
        return view('ModifyingSurveys', ["questions" => $surveyArray, "name" => $surveyName]);
    }

    /**
     * The method that will update the survey with the new additions and deletions
     */
    public function store()
    {
        $surveyName = "IBDPREM_One";

        //TODO get the updated survey and reformat it
        $listQuestions = array(array('Text' => 'Text for test question 1', 'Type' => 'DropDown', 'PossibleResponses' => 'Option1,Option2,Option3,Option4'),
            array('Text' => 'Text for test question 2', 'Type' => 'Checkbox', 'PossibleResponses' => 'Option1,Option2,Option3'));

        Survey_Questions::where('SurveyName', $surveyName)->update(array('SurveyQuestions' => json_encode($listQuestions)));

        return redirect('/')->with('message', 'Survey has been updated successfully.');
    }
}
