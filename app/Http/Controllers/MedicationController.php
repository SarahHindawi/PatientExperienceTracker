<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication_List;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;

class MedicationController extends Controller
{
    public function create()
    {
        if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        return view('Medication');

    }

    public function add(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        $this->validate($request, [
            'medication' => 'required',
        ]);

        $medication = $request->input('medication');

        $medicationsList = Medication_List::select("MedicationName")->get()->toArray();

        for ($i = 0; $i < count($medicationsList); $i++) {
            if (strtolower($medicationsList[$i]['MedicationName']) == strtolower($medication)) {
                return view('Medication')->with('message', "Medication already exists.");
            }
        }


        $newmedication = new Medication_List();
        $newmedication->MedicationName = $medication;
        $newmedication->save();

        return redirect('/')->with('message', "Medication has been added.");

    }
}
