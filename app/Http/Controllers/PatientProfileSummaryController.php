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

        return view('PatientSummaryResult', ["Summary" => $data]);
    }

}
