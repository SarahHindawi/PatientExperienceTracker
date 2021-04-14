<!DOCTYPE html>
<html>
<head>
    <title>Admin Help</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">

<!--
    <script src="{{ URL::asset('https://kit.fontawesome.com/a076d05399.js') }}" crossorigin='anonymous'></script>
    -->

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

        li {
            list-style-type: circle;
            display: list-item
        }

        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }

        body {
            overflow: initial;
        }
    </style>

</head>

<div id="wrapper">
    <body style="margin-top: 1cm">
    <div style="margin-left:8.5%">
        <h2 style="text-align:center; color:seagreen">Admin Help Information</h2>
        <br>

        <div>
            <ul class="list-group" style="margin-left: 100px">
                <li><a href="#create">Create a New Survey</a></li>
                <li><a href="#modify">Modify a Survey</a></li>
                <li><a href="#delete">Delete a Question</a></li>
                <li><a href="#add">Add a Question</a></li>
                <li><a href="#survey">Fill Out a Survey</a></li>
                <li><a href="#generate">Generate a Report of the Responses</a></li>
                <li><a href="#profile">View a Patient's Profile</a></li>
                <li><a href="#registerAdmin">Register a New Admin</a></li>
                <li><a href="#changePassword">Change Your Password</a></li>
                <li><a href="#accept">Accept New Patients</a></li>
                <li><a href="#password">Accept Password Reset Requests</a></li>
            </ul>

            <br>
            <hr>

            <div style="margin-left: 100px">

                <h4 style="margin-top: 30px; color:seagreen" id="create">Create a New Survey</h4><br>
                <h6>
                    Steps:
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="modify">Modify a Survey</h4><br>
                <h6>
                    Feature Prerequisites: A logged in Administrator. <br><br>

                    Step 1) To modify a survey a logged in Administrator must select the option Modify a Survey from
                    either the right-hand sidebar or the dashboard options in the middle of the Administrator
                    Dashboard. <br><br>

                    Step 2) The Administrator is then served a page that will allow them to select a survey name
                    from a list of the existing surveys that are served by the application. The administrator can
                    select a survey modification from this list. <br><br>

                    Step 3) At this step the Administrator will be presented with a page to select the modification
                    they would like to make. They will see the current state of the survey and be able to complete
                    one of two actions at this page.
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="delete">Delete a Question</h4><br>
                <h6>

                    Step 4A) If the Administrator would like to delete a question the user can look at the current
                    state of the survey. Each question within the survey will have a red ‘X’ that will act as a
                    selection button to delete that question. Selecting to click on one of these buttons will lead
                    to page where the Administrator will need to confirm they would like to delete the question.
                    <br><br>

                    Step 5A) On the Question Deletion Confirmation page the user will see a warning that the action
                    they are about to complete cannot be undone and they will need to confirm that they would like
                    to continue. After checking a confirmation checkbox the Administrator can click to submit the
                    deletion. This will delete the selected question and redirect the Administrator to their
                    respective dashboard with a success message.
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="add">Add a Question</h4><br>
                <h6>

                    Step 4B) Underneath the current status of the selected survey the user will see a small form
                    where they can select to add a question. These are the fields and how to use them to add a
                    question. <br><br>

                    New Question #: this is the position the question in the survey. For example, if you would like
                    to create a new question that appears as the new first question enter 1 into this field. The
                    questions after this question will shift one position down in the question order.<br><br>

                    Question Type: This is the type of the question. There are currently 4 Question Types supported
                    by the application: Freetext, CheckBox, RadioButtons. And DropDown <br><br>
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="survey">Fill Out a Survey</h4><br>
                <h6>
                    Steps:
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="generate">Generate a Report of the Responses</h4><br>
                <h6>
                    Steps:
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="profile">View a Patient's Profile</h4><br>
                <h6>
                    Steps:
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="registerAdmin">Register a New Admin</h4><br>
                <h6>
                    Steps:
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="changePassword">Change Your Password</h4><br>
                <h6>
                    Steps:
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="accept">Accept New Patients</h4><br>
                <h6>

                    <!--Accepting new patient instruction-->
                    Feature Prerequisites: A logged in Administrator. <br><br>

                    Step 1) If you would like to check if there is any New Patient Registrations or Password Reset
                    Requests to review select “Patient Registrations” or “Patient Password Reset Requests” from
                    either the left-hand sidebar or options in the center of the Dashboard. <br> <br>

                    Step 2) A page is presented that will list patients that have registered to the application.
                    After reviewing a request for registration or a password reset there will be a green checkmark
                    or red ‘X’ to select. After choosing your option for each hit the submit button. NOTE: At this
                    step if you do not recognize a new patient Selecting the red ‘X’ beside their information will
                    delete their tentative profile and deny the registration request. <br><br>

                    Step 3) After reviewing all requests and selecting to either approve or deny each request click
                    on the submit button at the bottom of the list of requests. Any accepted requests in the New
                    Patient Registration Page will receive an email that their registration request has been
                    accepted and they may login with credentials that they supplied. On the Patient Password Reset
                    Request Page when you click submit the application will create a temporary random password for
                    the patient and will send it to them in a brief email. Any denied registration requests will
                    have the profile deleted.
                </h6>
                <br><br>

                <h4 style="margin-top: 30px; color:seagreen" id="password">Accept Password Reset Requests</h4><br>
                <h6>

                    Feature Prerequisites: A logged in Administrator. <br><br>

                    Step 1) If you would like to check if there is any Password Reset
                    Requests to review, select “Patient Password Reset Requests” from
                    either the left-hand sidebar or options in the center of the Dashboard. <br> <br>

                    Step 2) A page is presented that will list patients that requested to change their password at the
                    login page.
                    After reviewing a request for password reset there will be a green checkmark
                    or red ‘X’ to select. After choosing your option for each hit the submit button. NOTE: Selecting the
                    red
                    ‘X’ beside their information will ignore the password reset request,
                    so the patient might not be able to login later. <br><br>

                    Step 3) After reviewing all requests and selecting to either approve or deny each request click
                    on the submit button at the bottom of the list of requests. On the Patient Password Reset
                    Request Page, when you click submit the application will create a temporary random password for
                    the patient and will send it to them in a brief email.
                </h6>
                <br>
            </div>
        </div>
    </div>

    <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <li class="nav-item">
                        <!-- the Dashboard options-->
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/')}}">
                                <img src="{{asset('assets/images/Home.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Dashboard</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/accept/create')}}">
                                <img src="{{asset('assets/images/request.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Patient Registration</a></p>
                    </li>
                    <li class="nav-item">

                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/resetreview/create')}}">
                                <img src="{{asset('assets/images/request.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Password Reset</a></p>

                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/profilesearch')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Patient Summary</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/report/create')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Generate Report</a></p>
                    </li>

                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{url('/passwordchangeadmin')}}">
                                <img src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Change Password</a></p>
                    </li>

                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/addsurvey/create')}}"><img
                                    src="{{asset('assets/images/survey.png')}}" width="25" height="25"
                                    class="d-inline-block align-right"> Create New Survey</a></p>
                    </li>


                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/editSurveySelect')}}">
                                <img src="{{asset('assets/images/survey.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Modify a Survey</a></p>
                    </li>


                    <!--Logout Option-->
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/logout')}}"><img
                                    src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                    class="d-inline-block align-right"> Logout</a></p>
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

    </div>
    </body>

</div></html>
