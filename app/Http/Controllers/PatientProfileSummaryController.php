<?php

namespace App\Http\Controllers;

use App\Models\PatientReport;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;


class PatientProfileSummaryController extends Controller
{
    public function index()
    {

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        $data = Patient::paginate(10);
        return view('ProfileSummary')->with('data', $data);
    }

    public function search(Request $request)
    {
        if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                //TODO redirect to Patient Dashbaord with unauthorized message.
            }
            return redirect('/adminlogin');
        }

        $this->validate($request, [
            'inputEmail' => 'required|email',
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
        ]);


        $data = DB::table('PATIENT_PROFILE');
        if (!empty($request->inputEmail)) {
            if ($request->inputEmail) {
                $data = $data->where('Email', 'LIKE', "%" . $request->inputEmail . "%");
            }
        }

        if (!empty($request->inputFirstName)) {
            if ($request->inputFirstName) {
                $data = $data->where('FirstName', 'LIKE', "%" . $request->inputFirstName . "%");
            }
        }
        if (!empty($request->inputLastName)) {
            if ($request->inputLastName) {
                $data = $data->where('LastName', 'LIKE', "%" . $request->inputLastName)->get();
            }
        }

        if (count($data) == 0) {
            echo '<script type="text/javascript">alert("No records match the specified data.")</script>';
            return view('ProfileSummary');
        }

        $data = (array)$data[0];

        $responses = DB::table('Survey_Responses');

        $responses = $responses->where('Email', 'LIKE', "%" . $request->inputEmail . "%")->get();


        $responses = (array)$responses->toArray();

        return view('PatientSummaryResult', ["Summary" => $data, "responses" => $responses['responses']]);
    }
}
