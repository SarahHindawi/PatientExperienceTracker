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

        $surveyIndex = $request->input('SurveyName');
        $surveyList = Survey_Questions::select('SurveyName')
            ->pluck('SurveyName');

        //Match the input dropdown index to get the survey name selected.
        $surveyName = $surveyList[$surveyIndex];

        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);

        return view('ModifyingSurveys', ["questions" => $surveyArray, "name" => $surveyName]);
    }

    public function createStr()
    {
        $surveyName = request()->name;
        $message = request()->message;
        $survey = Survey_Questions::query()->where("SurveyName", $surveyName)->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);

        if (strlen($message) > 1) {
            return view('ModifyingSurveys', ["questions" => $surveyArray, "name" => $surveyName, "message" => $message]);
        }
        return view('ModifyingSurveys', ["questions" => $surveyArray, "name" => $surveyName]);
    }


    //Function to diliver deletion confirmation page.
    public function deletionConfirmation(Request $request)
    {

        $this->validate($request, [
            'SurveyName' => 'required',
            'QuestionIndex' => 'required',
        ]);

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if (!Auth::guard('admin')->check()) {

            if (Auth::guard('patient')->check()) {
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        $survey = Survey_Questions::query()->where("SurveyName", $request->input('SurveyName'))->first();
        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);
        $surveyArray = array($surveyArray[($request->input('QuestionIndex') - 1)]);

        return view('Deletion_Confirmation', ["questions" => $surveyArray, "name" => $request->input('SurveyName'), "questionIndex" => ($request->input('QuestionIndex') - 1)]);
    }


    //Fuunction to Delete scelected Question after confirmation page.
    public function deleteQuestion(Request $request)
    {
        $this->validate($request, [
            'SurveyName' => 'required',
            'QuestionIndex' => 'required',
        ]);

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if (!Auth::guard('admin')->check()) {

            if (Auth::guard('patient')->check()) {
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        if ($request->input('Confirmation') !== 'True') {

            $url = '/editSurvey/recreate?name='. $request->input('SurveyName').'&message='."Question deletion aborted: No Confirmation";
            return redirect($url);

//            return redirect('')->with('message', 'Question deletion aborted: No Confirmation');
        }

        $survey = Survey_Questions::query()->where("SurveyName", $request->input('SurveyName'))->first();

        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);

        //remove selected question and reindex.

        unset($surveyArray[$request->input('QuestionIndex')]);
        $newQuestions = array_values($surveyArray);

        $survey->SurveyQuestions = json_encode($newQuestions);
        $survey->save();

        $url = '/editSurvey/recreate?name='. $request->input('SurveyName').'&message='.".";
        return redirect($url);

//        return redirect('/')->with('message', 'Survey has been updated successfully.');
    }

    public function addQuestion(Request $request)

    {
        $this->validate($request, [
            'SurveyName' => 'required',
            'qNumber' => 'required',
            'qType' => 'required',
            'qText' => 'required',
        ]);

        if (!Auth::guard('admin')->check()) {

            if (Auth::guard('patient')->check()) {
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }


        //Verify responses exist for non FreeText questions
        if ($request->input('qResponses') === null) {
            if ($request->input('qType') !== 'FreeText') {

                $url = '/editSurvey/recreate?name='. $request->input('SurveyName').'&message='."Responses required for non FreeText Questions";
                return redirect($url);

//                return back()->with('message', 'Responses required for non FreeText Questions');
            }
        }

        //Create new question and submit incorporate into the supplied survey name at the new question index.

        $newQuestion = array(array('Text' => $request->input('qText')
        , 'Type' => $request->input('qType'), 'PossibleResponses' => $request->input('qResponses'))
        );

        if ($request->input('qType') === 'FreeText') {
            $newQuestion[0]['PossibleResponses'] = '';
        }

        $survey = Survey_Questions::query()->where("SurveyName", $request->input('SurveyName'))->first();

        $surveyArray = json_decode($survey, true);
        $surveyArray = json_decode($surveyArray["SurveyQuestions"], true);

        array_splice($surveyArray, ($request->input('qNumber') - 1), 0, $newQuestion);

        $survey->SurveyQuestions = json_encode($surveyArray);
        $survey->save();

        $url = '/editSurvey/recreate?name='. $request->input('SurveyName').'&message='.".";
        return redirect($url);

//        return redirect('/')->with('message', 'Survey has been updated successfully.');
    }
}
