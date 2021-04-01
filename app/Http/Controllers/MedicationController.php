<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication_List;

class MedicationController extends Controller
{
    public function add(Request $request)
    {
        $medication = new Medication_List();
        $medication->MedicationName = $request->input('MedicationName');
        $medication->save();

    }
}
