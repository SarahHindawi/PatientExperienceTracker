<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;


class ViewResponseController extends Controller
{
    public function create()
    {
        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if (!Auth::guard('admin')->check()) {

            if (Auth::guard('patient')->check()) {
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        //create an array from the responses string
        $responses = explode("|", substr($_POST['responses'], 1, -1));

        $questions = [];
        $answers = [];

        for ($i = 0; $i < count($responses) - 1; $i++) {
            $ar = explode("::", $responses[$i]);

            $questions[] = $ar[0];
            $answers[] = $ar[1];
        }

        return view('preview_responses', ['questions' => $questions, 'answers' => $answers,
            'surveyName' => $_POST['name'], 'date' => $_POST['date'], 'patient' => $_POST['patient'], 'email' => $_POST['email']]);
    }
}
