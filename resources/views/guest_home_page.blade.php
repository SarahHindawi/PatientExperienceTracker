<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin_dashboard_page.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">
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
            width: 1519px;
        }
    </style>
</head>
<div id="wrapper">
    <body>


    <section class="container-fluid">

        @if(Session::has('message'))
            <p class="alert alert-info" style="text-align:center; width:94%; margin-left:110px">{{ Session::get('message') }}</p>
        @endif

        <div style="margin-left: 10px">
            <p class="text-center h1" style="color:seagreen;margin-left: 4cm; margin-top: 2%">Welcome to the Patient
                Experience Tracker </p>

            <p class="text-center h4" style="margin-left: 4cm;margin-top: 5%; text-align:center">Please select one
                of the options below </p>


            <!-- The dashboard options in the center of the page-->
            <div style="margin-left: -55px">
                <ul class="lp">

                    <li>
                        <button style="height: 2.2cm" class="block button button1"
                                onclick="location.href='/adminlogin'"><span><img
                                    src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                    class="d-inline-block align-right"> Administrator Login</span>
                        </button>
                    </li>
                    &nbsp;&nbsp;&nbsp;
                    <li>
                        <button style="height: 2.2cm; margin-bottom: 2cm" class="block button button1"
                                onclick="location.href='/patientlogin'" type="button"><span><img
                                    src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                    class="d-inline-block align-right"> Patient Login</span>
                        </button>
                    </li>
                    &nbsp;&nbsp;&nbsp;
                    <li>
                        <button style="margin-top: -2cm; margin-left: -7.7cm" class="block button button1"
                                onclick="location.href='/patientregistration'" type="button"><span><img
                                    src="{{asset('assets/images/signup.png')}}" width="25" height="25"
                                    class="d-inline-block align-right"> Click here to register as a patient</span>
                        </button>
                    </li>
                </ul>
            </div>


            <!-- The dashborad which has all the options for guests. This dashboard is located in the side of the page-->
            <div class="msb" id="msb">
                <p class="text-center fs-2">PET</p>

                <nav class="navbar navbar-default" role="navigation">
                    <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                        <ul class="nav flex-column" style="width:100%">
                            <!-- the Dashboard options-->
                            <!-- Home Option -->
                            <li class="nav-item">
                                <p><a class=" text-dark nav-link active" aria-current="page"
                                      href="{{ url('/')}}"><img src="{{asset('assets/images/Home.png')}}"
                                                                width="25" height="25"
                                                                class="d-inline-block align-right"> Home</a>
                                </p>
                                <!-- Sign Up option-->
                            </li>
                            <li class="nav-item">
                                <p><a class=" text-dark nav-link active" aria-current="page"
                                      href="{{ url('/patientregistration')}}"><img
                                            src="{{asset('assets/images/signup.png')}}" width="25" height="25"
                                            class="d-inline-block align-right"> Sign Up</a></p>
                            </li>
                            <!-- Patient Login option-->
                            <li class="nav-item">
                                <p><a class="text-dark nav-link active" aria-current="page"
                                      href="{{ url('/patientlogin')}}"><img
                                            src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                            class="d-inline-block align-right"> Patient Login</a></p>
                            </li>
                            <!-- Administrator Login option-->
                            <li class="nav-item">
                                <p><a class="text-dark nav-link active" aria-current="page"
                                      href="{{ url('/adminlogin')}}"><img
                                            src="{{asset('assets/images/key.png')}}" width="22" height="25"
                                            class="d-inline-block align-right"> Administrator Login</a></p>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>

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
