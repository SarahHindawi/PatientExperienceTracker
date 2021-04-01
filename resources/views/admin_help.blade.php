<!DOCTYPE html>
<html>
<head>
    <title>Admin Help</title>
   <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">

    <script src="{{ URL::asset('https://kit.fontawesome.com/a076d05399.js') }}" crossorigin='anonymous'></script>

    <style>
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        [type=radio] + img {
            cursor: pointer;
        }
        [type=radio]:checked + img {
            outline: 2px solid #f00;
        }
        .btn-logout {
            width: 100%;
            padding: 3px 20px !important;
            text-align: left !important;
        }
        .drop {
            color: rgba(45, 87, 45, 0.75);
        }
        .btn-success:hover {
            color: rgb(255, 255, 255);
            background: rgba(44, 92, 44, 0.75);
            border: 2px solid rgba(38, 83, 38, 0.75);
        }
        .btn-success {
            font-size: 13px;
            color: rgba(45, 87, 45, 0.75);
            letter-spacing: 1px;
            line-height: 15px;
            border: 2px solid rgba(48, 80, 48, 0.75);
            border-radius: 40px;
            background: transparent;
            transition: all 0.3s ease 0s;
        }
        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }
    </style>

</head>

<div id="wrapper">
<body>
 <section class="container-fluid">
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Default</a>
        <form class="d-flex">
            <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button"
                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
            </button>
        </form>
    </div>
</nav>

<div style=" margin-top:5%; margin-left:10%">
    <h3 style = "color:seagreen; text-align:center;">Patient Experience Tracker</h3>
    <h4 style = "text-align:center; color:blue";>Admin Help Information</h4>
    <br>
     <p class="text-center" style="color: red;">Please hover over each of the feature from the list below to know how to
    use each of the feature!</p>
    
    <div class="d-flex justify-content-center">.
        <ul class="list-group">
        <li><a href="#modify">Modify Survey</a></li>
            <li><a href="#delete">Delete Question</a></li>
            <li><a href="#add">Add Question</a></li>
            <li><a href="#accept">Accept New Patient</a></li>
            <li><a href="#change">Accept Password Request</a></li>
            <li><a href="#create">Create New Survey</a></li>
            <li><a href="#genrate">Generate Survey</a></li>
          </ul>

          <div style="margin-left: 100px">
            <h6 style="margin-top: 700px;" id="modify">

                <!--Modify Survey Instruction-->
                Feature Prerequisites: A logged in Administrator. <br><br>

                Step 1) To modify a survey a logged in Administrator must select the option Modify a Survey from either the right-hand sidebar or the dashboard options in the middle of the Administrator Dashboard. <br><br>

                Step 2) The Administrator is then served a page that will allow them to select a survey name from a list of the existing surveys that are served by the application. The administrator can select a survey modification from this list. <br><br>

                Step 3) At this step the Administrator will be presented with a page to select the modification they would like to make. They will see the current state of the survey and be able to complete one of two actions at this page.
            </h6>
        </div>

        <div style="margin-left: 100px">
            <h6 style="margin-top: 700px;" id="delete">
                 <!--Deleting Question Instruction-->
                Deleting a Question <br><br>

                Step 4A) If the Administrator would like to delete a question the user can look at the current state of the survey. Each question within the survey will have a red ‘X’ that will act as a selection button to delete that question. Selecting to click on one of these buttons will lead to page where the Administrator will need to confirm they would like to delete the question. <br><br>

                Step 5A) On the Question Deletion Confirmation page the user will see a warning that the action they are about to complete cannot be undone and they will need to confirm that they would like to continue. After checking a confirmation checkbox the Administrator can click to submit the deletion. This will delete the selected question and redirect the Administrator to their respective dashboard with a success message.
            </h6>
        </div>

        <div style="margin-left: 100px">
            <h6 style="margin-top: 700px;" id="add">
                 <!--Adding Question Instruction-->
                Adding a Question <br><br>

                Step 4B) Underneath the current status of the selected survey the user will see a small form where they can select to add a question. These are the fields and how to use them to add a question. <br><br>

                New Question #: this is the position the question in the survey. For example, if you would like to create a new question that appears as the new first question enter 1 into this field. The questions after this question will shift one position down in the question order.<br><br>

                Question Type: This is the type of the question. There are currently 4 Question Types supported by the application: Freetext, CheckBox, RadioButtons. And DropDown <br><br>
            </h6>
        </div>

        <div style="margin-left: 100px">
            <h6 style="margin-top: 700px;" id="accept">
              
             <!--Accepting new patient instruction-->
             Feature Prerequisites: A logged in Administrator. <br><br>

             Step 1) If you would like to check if there is any New Patient Registrations or Password Reset Requests to review select “Patient Registrations” or “Patient Password Reset Requests” from either the left-hand sidebar or options in the center of the Dashboard. <br> <br>

             Step 2) A page is presented that will list patients that have registered to the application. After reviewing a request for registration or a password reset there will be a green checkmark or red ‘X’ to select. After choosing your option for each hit the submit button. NOTE: At this step if you do not recognize a new patient Selecting the red ‘X’ beside their information will delete their tentative profile and deny the registration request. <br><br>

             Step 3) After reviewing all requests and selecting to either approve or deny each request click on the submit button at the bottom of the list of requests. Any accepted requests in the New Patient Registration Page will receive an email that their registration request has been accepted and they may login with credentials that they supplied. On the Patient Password Reset Request Page when you click submit the application will create a temporary random password for the patient and will send it to them in a brief email. Any denied registration requests will have the profile deleted.
            </h6>
        </div>
</div>


<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid" style="height: 30px; width: 800px">
        </nav>

<div class="msb" id="msb">
            <p class="text-center fs-2">PET</p>

            <nav class="navbar navbar-default" role="navigation">
                <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                    <ul class="nav flex-column" style="width:100%">
                        <li class="nav-item">
                            <!-- the Dashboard options-->
                            <p><a class="text-dark nav-link active" aria-current="page"  href="{{ url('/')}}">
                                    <img src= "{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right"> Dashboard</a></p>
                        </li>
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/accept/create')}}">
                                    <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Registration</a></p>
                        </li>
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/passwordreset/create')}}">
                                    <img src= "{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> Password Reset</a></p>
                        </li>
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/profilesearch')}}">
                                    <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Summary</a></p>
                        </li>
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/report/create')}}">
                                    <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> Generate Report</a></p>
                        </li>
                    <!-- Comment Out due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Modify Survey</a></p>
                    </li>
                    -->
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page" href="{{url('/passwordchangeadmin')}}">
                                    <img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Change Password</a></p>
                        </li>
                    <!-- Comment Out Due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right">Admin Help</a></p>
                    </li>
                    -->
                        <!--Logout Option-->
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page"
                                                      href= "{{ url('/logout')}}" ><img src="{{ url('/logout')}}" ><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Logout</a></p>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div style="margin-left: 300px; position:absolute; top:205px">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
            integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
            integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
            crossorigin="anonymous"></script> 

</body>

</div>
</html>