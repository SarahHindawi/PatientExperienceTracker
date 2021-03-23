Guide testing Sprint 5 with updates for Sprint6

    The path: Route::get('/patientregistration', 'App\Http\Controllers\PatientRegistrationController@index');
    The URL in postman: http://127.0.0.1:8000/patientregistration
    The method: get
    
     --------------------------------------------------------------------------------------------------------------------------------------------

     The path: Route::get('/adminregistration', 'App\Http\Controllers\AdminRegistrationController@index');
     The URL in postman: http://127.0.0.1:8000/adminregistration
     The method: get

      ---------------------------------------------------------------------------------------------------------------------------------------------
       
       The path : Route::post('/adminregistration', 'App\Http\Controllers\AdminRegistrationController@register');
       The URL in postman: http://127.0.0.1:8000/adminregistration
       The method: post

       JSON OBJECT:

       {

"email": "testroot@test.ca",
"password": "rootPass123",       
"firstName":"TestRootFirst",
"lastName" :"TestRootLast"

     }

    -----------------------------------------------------------------------------------------------------------------------------------------------

    The path: Route::get('/profilesearch', 'App\Http\Controllers\PatientProfileSummaryController@index');
    The URL in postman: http://127.0.0.1:8000/profilesearch
    The method: get

     ----------------------------------------------------------------------------------------------------------------------------------------------

     The path: Route::get('/form/create', 'App\Http\Controllers\SurveyController@create');
     The URL in postman: http://127.0.0.1:8000/form/create
     The method: get

      ---------------------------------------------------------------------------------------------------------------------------------------------

      The path: Route::post('/form', 'App\Http\Controllers\SurveyController@store');
      The URL in postman: http://127.0.0.1:8000/form
      The methof: post

      JSON OBJECT:

      No need to add JSON OBJECT

       --------------------------------------------------------------------------------------------------------------------------------------------

       The path: Route::get('/adminlogin', 'App\Http\Controllers\AdminLoginController@index');
       The URL in postman: http://127.0.0.1:8000/adminlogin
       The method: get
     
        -------------------------------------------------------------------------------------------------------------------------------------------
         The path: Route::post('/adminloginpage', 'App\Http\Controllers\AdminLoginController@login');
         The URL in postman: http://127.0.0.1:8000/adminloginpage
         The method: post

         {
             "email": "testadmin@test.ca",
             "password": "adminPass"
	
         }
        ------------------------------------------------------------------------------------------------------------------------------------------
        The path: Route::get('/editSurvey/create', 'App\Http\Controllers\EditSurveyController@create');
        The URL in postman: http://127.0.0.1:8000/editSurvey/create
        The method: get

         ------------------------------------------------------------------------------------------------------------------------------------------

         The path: Route::get('/report/create', 'App\Http\Controllers\ReportController@create');
         The URL in postman: http://127.0.0.1:8000/report/create
         The method: get

    
    {
        "comment":"/*http://127.0.0.1:8000/adminloginpage  // method: get*/"
    },

{
"email":"nmayaleh@upei.ca",
"password": 123
},

     ----------------------------------------------------------------------------------------------------------------------------------------------

The path:  Route::post('/report', 'App\Http\Controllers\ReportController@store')  
The method: post  
What I changed before the testing: I changed the controller ReportController.
In order to do the test using postman, I need to have a request  in the method. I changed register method. I pot request instead of $_post so I can request the data from the data request body which is JSON object.

    Here how I change the code:

    public function store(Request $request)
    {

        $submittedData = $_POST;
        unset($submittedData["_token"]);


        //finding the patients that match the given filters

        $queryPatients = DB::table('Patient_Profile');

        if (!empty($request->gender)) {
            $gender = $request->gender;
        }
        //print_r($gender);

        if ($gender != 'all') {

            $queryPatients->where('Gender', 'LIKE',  $gender);
        }

        $weightAbove = $request->weightAbove;
        $weightBelow = $request->weightBelow;
        $weightEquals = $request->weightEquals;
        $weight = $request->weight;
        print_r($weight);
        if ($weight == 'above') {
            $queryPatients->where('Weight', '>', $weightAbove );
            //$weightAbove = $_POST["weightAbove"];
            print_r($weightAbove);
        } else if ($weight == 'below') {
            $queryPatients->where('Weight', '<', $weightBelow);
            //$weightBelow = $_POST["weightBelow"];
            print_r($weightBelow);
        } else if ($weight == 'equals') {
            $queryPatients->where('Weight', '=', $weightEquals);
        }

        $heightAbove = $request->heightAbove;
        $heightBelow = $request->heightBelow;
        $heightEquals = $request->heightEquals;
        $height = $request->height;

        if ($height == 'above') {
            $queryPatients->where('HeightInches', '>', $heightAbove);
        } else if ($height == 'below') {
            $queryPatients->where('HeightInches', '<', $heightBelow);
        } else if ($height == 'equals') {
            $queryPatients->where('HeightInches', '=', $heightEquals);
        }

        $filteredPatients = $queryPatients->get(["Email", "Medications", "DOB"]);


        $medicationUsage = $request->medicationUsage;

        $matchedPatients = [];

        if ($medicationUsage == 'includes') {

            //returns an array of the selected medications/boxes
            $medications = $request->medications;

            for ($i = 0; $i < count($filteredPatients); $i++) {


                //encode the whole row ($filteredPatients is an array of the returned rows from the database)
                $row = json_encode($filteredPatients[$i], true);
                $rowArray = json_decode($row, true);
                //remove the first character "[" and last one "]"
                $medArray = explode(",", substr($rowArray["Medications"], 1, -1));

                //remove the first character " and last one " for each medication string
                for ($j = 0; $j < count($medArray); $j++) {
                    $medArray[$j] = substr($medArray[$j], 1, -1);
                }

                //check if there are any matches
                $intersectionMeds = count(array_intersect($medArray, $medications));

                $date = date('Y-m-d', strtotime($rowArray['DOB']));

                //TODO check age: $age = date_diff($date, date("Y-m-d"));

                if ($intersectionMeds > 0) {
                    $matchedPatients[] = $rowArray['Email'];
                }
            }
        }

        //Get the responses of the patients that match the required filters
        $query = DB::table('Survey_Responses')
            ->where('SurveyName', "LIKE", $request->surveyName)
            ->wherein('Email', $matchedPatients)
            ->get();


        $responses = json_decode($query, true);

        $responsesArray = [];
        for ($i = 0; $i < count($responses); $i++) {
            $responsesArray[] = json_decode($responses[$i]["Responses"], true);
        }

        return view("ReportResults", ["responses" => $responsesArray]);
        //return "success";

    }
    JSON OBJECT

    {
        "surveyName":"IBDPREM_One",
        "gender":"male",
        "age":"all",
        "ageAbove":"",
        "ageBelow":"",
        "ageEquals":"",
        "height":"all",
        "heightAbove":"",
        "heightBelow":"",
        "heightEquals":"",
        "weight":"",
        "weightAbove":"",
        "weightBelow":"",
        "weightEquals":"",
        "medicationUsage":"none"
        
        
        }

         ------------------------------------------------------------------------------------------------------------------------------------------
         
         The path: Route::post('/patientregistration', 'App\Http\Controllers\PatientRegistrationController@register');
         
         The method: Post
         JSON OBJECT:

         {
 
          "email":"pp@upei.ca",
          "password":"123",
          "firstName":"ppfirst",

            "lastName":"require1d",
            "dob":"07-07-1993",
            "gender":"Female",
            "weight":12,
            "heightFeet":15,
            "heightInches":15,
            "condition":0,
            "medication":["Test Medication 1", "Test Medication 2"]
           
         }

         -----------------------------------------------------------------------------------------------------------------------------------------

          The path: Route::get('/accept/create', 'App\Http\Controllers\AcceptanceController@create')
          The URL in postman: http://127.0.0.1:8000/accept/create
          The method: get

        -----------------------------------------------------------------------------------------------------------------------------------------
         The path: Route::get('/passwordreset/create', 'App\Http\Controllers\PasswordController@create');
          The URL in postman: http://127.0.0.1:8000/passwordreset/create
          The method: get

        -----------------------------------------------------------------------------------------------------------------------------------------

         The path: Route::get('/logout', 'App\Http\Controllers\LogoutController@logout');
          The URL in postman: http://127.0.0.1:8000/logout
          The method: get

        -----------------------------------------------------------------------------------------------------------------------------------------
         The path: Route::get('/passwordreset/create', 'App\Http\Controllers\PasswordController@create');
          The URL in postman: http://127.0.0.1:8000/passwordreset/create
          The method: get

        -----------------------------------------------------------------------------------------------------------------------------------------
          The path: Route::get('/passwordchangeadmin', 'App\Http\Controllers\PasswordController@adminchange');
          The URL in postman: http://127.0.0.1:8000/passwordchangeadmin
          The method: get

        -----------------------------------------------------------------------------------------------------------------------------------------
         
        The path: Route::get('/passwordchangeadmin', 'App\Http\Controllers\PasswordController@adminchange');
          The URL in postman: http://127.0.0.1:8000/passwordchangeadmin
          The method: get

        -----------------------------------------------------------------------------------------------------------------------------------------The path: Route::get('/passwordchangeadmin', 'App\Http\Controllers\PasswordController@adminchange');
          The URL in postman: http://127.0.0.1:8000/passwordchangeadmin
          The method: get

        -----------------------------------------------------------------------------------------------------------------------------------------

        The path: Route::get('/passwordchangeadmin', 'App\Http\Controllers\PasswordController@adminchange');
          The URL in postman: http://127.0.0.1:8000/passwordchangeadmin
          The method: get

        -----------------------------------------------------------------------------------------------------------------------------------------
