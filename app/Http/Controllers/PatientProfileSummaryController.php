<?php

namespace App\Http\Controllers;

use App\Models\PatientReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientProfileSummaryController extends Controller
{
    public function index()
    {
        return view('ProfileSummary');
    }

    public function search(Request $request)
    {

       $this->validate($request, [
            'email' => 'required|email',
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
        ]);

        //dd($request);

        $data = DB::table('PATIENT_PROFILE');
        if (!empty($request->Email)) {
            if ($request->Email){
                $data = $data->where('Email', 'LIKE', "%" . $request->Email . "%");
            }
        }
        if (!empty($request->FirstName)) {
            if ($request->FirstName){
                $data = $data->where('FirstName', 'LIKE', "%" . $request->FirstName . "%");
            }
        }
        if (!empty($request->LastName)) {
            if ($request->LastName){
                $data = $data->where('LastName', 'LIKE', "%" . $request->LastName);
            }
        }


        return view('PatientSummaryResult', ["Summary"=>$data]);
    }

}
