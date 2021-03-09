<?php

namespace App\Http\Controllers;

use App\Models\PatientReport;
use Illuminate\Http\Request;

class PatientProfileSummaryController extends Controller
{
    public function index()
    {
        $data = \DB::table('patient_profile')->paginate(10);
        return view('ProfileSummary');
    }

    public function search(Request $request)
    {
        $data = \DB::table('patient_profile');
        if ($request->email) {
            $data = $data->where('email', 'LIKE', "%" . $request->email . "%");
        }
        if ($request->firstName) {
            $data = $data->where('firstName', 'LIKE', "%" . $request->firstName . "%");
        }
        if ($request->lastName) {
            $data = $data->where('lastName', 'LIKE', "%" . $request->lastName);
        }
        $data = $data->paginate(10);
        return view('GenerateReport');
    }
}
