<!DOCTYPE html>
<html>

<head>
    <title>Patient Login</title>
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/cssFile.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin_dashboard_page.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/buttons.css')}}">
    <style>
        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }
    </style>
    <!--
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    -->

</head>
<div id="wrapper">
<body>
    @if(Session::has('message'))
        <p class="alert alert-info" style="text-align:center; width:94.6%; height: 40px; margin-left: 90px">{{ Session::get('message') }}</p>
    @endif

     <!-- The dashborad which has all the options for guest. This dashboard is located in the side of the page-->
     <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <!-- the Dashboard options-->
                    <!-- Sign Up option-->
                    <li class="nav-item">
                        <p ><a class=" text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/')}}"><img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right">  Home</a></p>
                    </li>
                    <li class="nav-item">
                        <p ><a class=" text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/patientregistration')}}"><img src="{{asset('assets/images/signup.png')}}" width="25" height="25" class="d-inline-block align-right">  Sign Up</a></p>
                    </li>
                    <!-- Patient Login option-->
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/patientlogin')}}"><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right">  Patient Login</a></p>
                    </li>
                    <!-- Administrator Login option-->
                    <li class="nav-item">
                        <p ><a class="text-dark nav-link active" aria-current="page"
                                                  href= "{{ url('/adminlogin')}}" ><img src="{{asset('assets/images/key.png')}}" width="22" height="25" class="d-inline-block align-right">  Administrator Login</a></p>
                    </li>
                </ul>
            </div>

        </nav>
    </div>

    <section class="container-fluid">
    <div>
        <p class="text-center h1" style="color:seagreen; margin-top: 2%; margin-left: 4cm">Welcome to Patient Experience Tracker</p>
        <p class="text-center h3"style="margin-top:3%; margin-left: 4cm ">Enter your Email and Password to Login</p>
    </div>


    <section class="row justify-content-center" style="margin-left: 2cm">
        <section class="col-12 col-sm-6 col-md-3">
            <form style="margin-top: 5%;" method = "POST" action = "{{ url('/patientloginpage')}}">
                @csrf
                <!-- box for email-->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-group form-inline">Email address</label>
                    <input type="email" class="form-control shadow-lg p-3 mb-5 bg-white rounded"
                           id="email" aria-describedby="emailHelp" name = "email" required>
                </div>
                    <!-- box for password-->
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-group form-inline">Password</label>
                    <input type="password" class="form-control shadow-lg p-3 mb-5 bg-white rounded"
                           id="password" name = "password" required>
                        <!-- the paragraph under password if the admin forgot their passwords-->
                        <p class=" text-center h6">Having trouble remembering your password?</p>
                    <p class="text-center h6">Click <a href="{{url('/patientreset')}}">here</a> to reset your password.
                    </p>

                        <!-- sign in button-->
                    <button class="btn btn-success btn-rounded w-100 btn-lg ">Sign in</button>

                </div>
            </form>

        </section>
    </section>
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
