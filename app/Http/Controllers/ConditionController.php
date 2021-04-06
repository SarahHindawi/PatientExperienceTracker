<?php

namespace App\Http\Controllers;

use App\Models\Condition_List;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;

class ConditionController extends Controller
{
    public function create()
    {
        if (!Auth::guard('admin')->check()) {
            if (Auth::guard('patient')->check()) {
                return redirect('/');
            }
            return redirect('/adminlogin');
        }

        return view('Condition');

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
            'condition' => 'required',
        ]);

        $condition = $request->input('condition');

        $conditionList = Condition_List::select("Condition")->get()->toArray();

        for ($i = 0; $i < count($conditionList); $i++) {
            if (strtolower($conditionList[$i]['Condition']) == strtolower($condition)) {
                return view('Condition')->with('message', "Condition already exists.");
            }
        }


        $newcondition = new Condition_List();
        $newcondition->Condition = $condition;
        $newcondition->save();

        return redirect('/')->with('message', "Condition has been added.");

    }
}
