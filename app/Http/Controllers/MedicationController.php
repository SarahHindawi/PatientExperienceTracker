<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication_List;

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

        //TODO create view
        //return view('/');

    }

    public function add(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        $medication = new Medication_List();
        $medication->MedicationName = $request->input('MedicationName');
        $medication->save();

        return view('/')->with('message', "Medication has been added.");

    }
}
