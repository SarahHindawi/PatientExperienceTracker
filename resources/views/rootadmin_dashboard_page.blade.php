<!DOCTYPE html>
<html>
<head>
    <title>Root Admin Dashboard</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin_dashboard_page.css')}}">
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/buttons.css')}}">
    <!--
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    -->
    <!--Get your own code at fontawesome.com
        Here is the link to find all the important icons
    https://www.w3schools.com/icons/icons_reference.asp
    -->
    <style>
        #wrapper {
            margin-left: auto;
            margin-right: auto;
            min-width: 1519px;
            overflow-x:hidden;
        }

    </style>
</head>
<div id="wrapper">
<body>

<section class="container-fluid">
    @if(Session::has('message'))
        <p class="alert alert-info" style="text-align:center; width:93.8%; margin-left:110px">{{ Session::get('message') }}</p>
    @endif


        <p class="text-center h2" style="color:seagreen; margin-top: .5cm; margin-left: 4cm">Hello {{$name}}</p>


    <p class="text-center h4" style="text-align:center; margin-top:1cm; margin-left: 4cm">Here are your administration options </p>


    <!-- The dashboard options in the center of the page-->

    <ul class="lp" style="margin-top: 50px; margin-left: 10cm">
        <li>
            <button style="height: 2.2cm" class="block button button1" onclick="location.href='/accept/create'" type="button"><span><img
                        src="{{asset('assets/images/request.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> New Patient Registration. <br>Click here to review</span>
            </button>
        </li>
        &nbsp;&nbsp;&nbsp;
        <li>
            <button style="height: 2.2cm" class="block button button1" onclick="location.href='/resetreview/create'" type="button"> <span><img
                        src="{{asset('assets/images/request.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> Patient Password Reset Requests. Click here to review
           </span></button>
        </li>
        &nbsp;&nbsp;&nbsp;
        <li>
            <button style="height: 2.2cm"class="block button button1" onclick="location.href='/profilesearch'"><span> <img
                        src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> View Patient Profile</span></button>
        </li>
        &nbsp;&nbsp;&nbsp;
        <li>
            <button style="height: 2.2cm"class="block button button1" onclick="location.href='/report/create'"><span><img
                        src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> Generate Report of PERM and PROM Survey Data</span>
            </button>
        </li>
        &nbsp;&nbsp;&nbsp;

        <li>
            <button style="height: 2.2cm"class="block button button1" onclick="location.href='/passwordchangeadmin'"><span><img
                        src="{{asset('assets/images/key.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> Change Your Password</span></button>
        </li>
        &nbsp;&nbsp;&nbsp;

        <li>
            <button style="height: 2.2cm" class="block button button1" onclick="location.href='/adminregistration'"><span><img
                        src="{{asset('assets/images/signup.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> Register a New Admin</span>
            </button>
        </li>

        <br>
        <li>
            <button style="height: 2.2cm; margin-top: -20px" class="block button button1" onclick="location.href='/addsurvey/create'"><span><img
                        src="{{asset('assets/images/survey.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> Create a New Survey
            </span></button>
        </li>

        <br>
        <li>
            <button style="height: 2.2cm" class="block button button1" onclick="location.href='/editSurveySelect'"><span><img
                        src="{{asset('assets/images/survey.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> Modify a Survey
           </span></button>
        </li>

        <br>
        <li>
            <button style="height: 2.2cm;" class="block button button1" onclick="location.href='/adminsurveyselection'"><span><img
                        src="{{asset('assets/images/survey.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> Fill Out a Survey
            </span></button>
        </li>

        <br>
        <li>
            <button style="height: 2.2cm" class="block button button1" onclick="location.href='/adminhelp'"><span><img
                        src="{{asset('assets/images/questionmark.png')}}" width="25" height="25"
                        class="d-inline-block align-right"> Admin Help
            </span></button>
        </li>

        <br>
        <li><button  style="height: 2.2cm" class="block button button1" onclick="location.href='/medication'"><span><img src="{{asset('assets/images/medication.png')}}" width="25" height="25" class="d-inline-block align-right"> Add a Medication
            </span></button></li>

        <br>
        <li><button  style="height: 2.2cm" class="block button button1" onclick="location.href='/condition'"><span><img src="{{asset('assets/images/clinic.png')}}" width="25" height="25" class="d-inline-block align-right"> Add a Clinic
            </span></button></li>

    </ul>


    <!-- The dashboard which has all the options for the rootadmin. This dashboard is located in the side of the page-->
    <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <!-- the Dashboard options-->
                    <li class="nav-item">
                        <!-- the Dashboard options-->
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{url('/')}}">
                                <img src="{{asset('assets/images/Home.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Dashboard</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/accept/create')}}">
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
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/profilesearch')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Patient Summary</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/report/create')}}">
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
                              href="{{ url('/addsurvey/create')}}"><img src="{{asset('assets/images/survey.png')}}"
                                                                        width="25" height="25"
                                                                        class="d-inline-block align-right"> Create New
                                Survey</a></p>
                    </li>

                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/editSurveySelect')}}">
                                <img src="{{asset('assets/images/survey.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Modify a Survey</a></p>
                    </li>

                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/adminregistration')}}">
                                <img src="{{asset('assets/images/signup.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Register Admin</a></p>
                    </li>

                    <!--Logout Option-->
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/logout')}}"><img src="{{asset('assets/images/key.png')}}" width="25"
                                                              height="25" class="d-inline-block align-right"> Logout</a>
                        </p>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


</section>


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
