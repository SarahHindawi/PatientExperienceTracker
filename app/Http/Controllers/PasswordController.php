<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetMail;

class PasswordController extends Controller
{
    public function create()
    {

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if(!Auth::guard('admin')->check()){

           if(Auth::guard('patient')->check()){
                //If Patient logged in Redirect to Patient Dashboard.
               return redirect('/');
           }
           return redirect('/adminlogin');
       }


        //get a list of the patients that submitted a request to reset their password
        $passwordResetRequests = Patient::select(['FirstName', 'LastName', 'Email'])->where('NewAccount', 'false')->where("PasswordReset", "true")->get();

        $patientsInfo = [];
        for ($i = 0; $i < count($passwordResetRequests); $i++) {
            $patient = $passwordResetRequests->all()[$i]->toArray();
            $patient = $patient["FirstName"] . " " . $patient["LastName"] . " (" . $patient["Email"] . ")";
            $patientsInfo[] = $patient;
        }

        return view('PasswordReset', ["patients" => $patientsInfo]);
    }

    public function store()
    {

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
           }
           return redirect('/adminlogin');
        }

        if (!isset($_POST['data'])) {
            return view("Admin_dashboard_page");
        }

        $submittedData = $_POST['data'];
        unset($submittedData["_token"]);



        $accepted = [];
        $removed = [];

        //iterate over each returned element in the form, and check whether this patient was accepted or removed
        foreach ($submittedData as $key => $value) {
            $email = substr(explode(" (", $key)[1],0,-1);
            if ($value == "Accept") {
                $accepted[] = $email;

            } else {
                $removed[] = $email;
            }
        }


        //for each accepted password-reset request, create a temporary password ("pending" indicates that the patient has not set a permanent password yet)
        foreach ($accepted as $acceptedEmail) {
            $tempPassword = Str::random(8);

            $details = [
                'temppass' => $tempPassword
            ];

            Mail::to($acceptedEmail)->send(new ResetMail($details));
            Patient::where('email', $acceptedEmail)->update(array('PasswordReset' => "pending", "password" => Hash::make($tempPassword)));
        }

        foreach ($removed as $removedEmail) {
            Patient::where('email', $removedEmail)->update(array('PasswordReset' => "false"));
        }

        return redirect('/');
    }

    public function patientchange(){

          //Check if Patient is logged in.
        if(!Auth::guard('patient')->check()){
            if(Auth::guard('admin')->check()){
                return redirect('/');
            }
            return redirect('/')->with('message', 'No user logged in.');
        }

        return view('patient_password_change');
    }

    public function patientsave(Request $request){

        //Check if Patient is logged in.
           if(!Auth::guard('patient')->check()){
            if(Auth::guard('admin')->check()){
                return redirect('/');
            }
            return redirect('/')->with('message', 'No user logged in.');
        }



        //Password Requirements and Confirmation.
        $this->validate($request, [
            'currentpass' => 'required',
            'password' => 'required|min:6',
            'password2' => 'same:password',
        ]);

        //As user is currently logged in get the currently authenticated user and change their password.
        $currentUser = Auth::guard('patient')->user();
        $currentEmail = $currentUser->email;

        if(!Auth::guard('patient')->validate(['email' => $currentEmail , 'password' => $request->input('currentpass')])){
            return redirect('/passwordchangepatient')->with('message', 'Current Password is incorrect.');
        }

        $currentUser->password = Hash::make($request->input('password'));


        //Check if current password is temprary and turn flag to false if so.
        $tempPassCheck = Auth::guard('patient')->user()->PasswordReset;

        if((strcmp($tempPassCheck, "pending") === 0)){
            $currentUser->PasswordReset = "false";
        }

        $currentUser->save();

        //Redirect to dash with success message.
        return redirect('/')->with('message', 'Password changed successfully.');
    }

    public function adminchange(){

          //Check if Admin is logged in.
          if(!Auth::guard('admin')->check()){
            if(Auth::guard('patient')->check()){
                return redirect('/');
            }
            return redirect('/')->with('message', 'No user logged in.');
        }

        return view('admin_password_change');


    }

    public function adminsave(Request $request){
    //Check if Admin is logged in.
    if(!Auth::guard('admin')->check()){
        if(Auth::guard('patient')->check()){
            return redirect('/');
        }
        return redirect('/')->with('message', 'No user logged in.');
    }



    //Password Requirements and Confirmation.
    $this->validate($request, [
        'currentpass' => 'required',
        'password' => 'required|min:6',
        'password2' => 'same:password',
    ]);

    //As user is currently logged in get the currently authenticated user and change their password.
    $currentUser = Auth::guard('admin')->user();
    $currentEmail = $currentUser->email;

    if(!Auth::guard('admin')->validate(['email' => $currentEmail , 'password' => $request->input('currentpass')])){
        return redirect('/passwordchangepatient')->with('message', 'Current Password is incorrect.');
    }

    $currentUser->password = Hash::make($request->input('password'));
    $currentUser->save();

    //Redirect to dash with success message.
    return redirect('/')->with('message', 'Password changed successfully.');
    }

    public function adminresetindex(){

     //Checking if there is an Authenticated user and redirecting to dashboard as they do not need to reset password.
    if (Auth::guard('admin')->check()) {

        return redirect('/');
    } else if (Auth::guard('patient')->check()) {
        return redirect('/');
    }

    return view('admin_reset');
    }

    public function adminresetemail(Request $request){
        //Checking if there is an Authenticated user and redirecting to dashboard as they do not need to reset password.

        if (Auth::guard('admin')->check()) {
            return redirect('/');
        } else if (Auth::guard('patient')->check()) {
            return redirect('/');
        }

        $this->validate($request, [
            'email' => 'required|email',
        ]);


        //Check if Admin profile with input email exists.
        $existanceTest = Admin::where('Email', $request->input('email'))->first();

        if(!$existanceTest)
        {
            return redirect('/adminreset')->with('message', 'Request Failed. Administrator Profile with email does not exist');
        }

        $tempPassword = Str::random(8);

        $details = [
            'temppass' => $tempPassword
        ];

        Mail::to($request->input('email'))->send(new ResetMail($details));

        Admin::where('Email', $request->input('email'))->update(array("password" => Hash::make($tempPassword)));

        return redirect('/')->with('message', 'Administrator password reset successful please check email.');
        }

    public function patientresetindex(){

        //Checking if there is an Authenticated user and redirecting to dashboard as they do not need to reset password.
       if (Auth::guard('admin')->check()) {

           return redirect('/');
       } else if (Auth::guard('patient')->check()) {
           return redirect('/');
       }

       return view('patient_reset');
    }

    public function patientresetrequest(Request $request){


        if (Auth::guard('admin')->check()) {
            return redirect('/');
        } else if (Auth::guard('patient')->check()) {
            return redirect('/');
        }

        $this->validate($request, [
            'email' => 'required|email',
        ]);


        //Check if Patient profile with input email exists.
        $existanceTest = Patient::where('Email', $request->input('email'))->first();

        if(!$existanceTest)
        {
            return redirect('/patientreset')->with('message', 'Request Failed. Patient Profile with email does not exist');
        }

        Patient::where('email', $request->input('email'))->update(array('PasswordReset' => "true",));

        return redirect('/')->with('message', 'Password reset request sent for Administrator review. Response will be sent to email.');

    }
}
