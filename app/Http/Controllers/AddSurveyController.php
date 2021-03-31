<?php

namespace App\Http\Controllers;

use App\Models\Survey_Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AddSurveyController extends Controller
{
    public function create()
    {
        /*if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
                return redirect(' /');
            }
            return redirect('/adminlogin');
        }*/

        return view('create_new_survey');
    }


    public function store(Request $request)
    {

       /* if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
                return redirect(' /');
            }
            return redirect('/adminlogin');
        }*/

        //retrieve the submitted data
        $this->validate($request, [
            'SurveyName' => 'required',
            'ConditionServed' => 'required',
            'SurveyType' => 'required',
        ]);

        //a list of two questions to be stored as dummy questions in the new survey
        $testQuestions = array(array('Text' => 'Text for test question 1' , 'Type' => 'DropDown' , 'PossibleResponses' => 'Option1,Option2,Option3,Option4'),
            array('Text' => 'Text for test question 2' , 'Type' => 'Checkbox' , 'PossibleResponses' => 'Option1,Option2,Option3'));

        $num = DB::table('Survey_Questions')
            ->where('SurveyName', 'LIKE', $request->input('SurveyName'))->count();


        if ($num > 0) {
            return view('create_new_survey',['message' => 'There already exists a survey with the same name. Please change the given Survey Name']);
        }

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => $request->input('SurveyName'),
            'ConditionServed' => $request->input('ConditionServed'),
            'SurveyType' => $request->input('SurveyType'),
            'SurveyQuestions' => json_encode($testQuestions)
        ]);

        return redirect('/')->with('message', 'New survey has been created successfully.');
    }
}
