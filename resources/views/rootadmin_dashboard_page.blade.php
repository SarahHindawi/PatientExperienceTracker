<!DOCTYPE html>
<html>
<head>
    <title>Root Admin Dashboard</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin_dashboard_page.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/buttons.css')}}">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!--Get your own code at fontawesome.com
        Here is the link to find all the important icons
    https://www.w3schools.com/icons/icons_reference.asp
    -->
    <style>
        #wrapper {
            margin-left:auto;
            margin-right:auto;
            width:1519px;
        }
    </style>
</head>
<div id="wrapper">
<body>

<section class="container-fluid">
    @if(Session::has('message'))
    <p class="alert alert-info" style="text-align:center">{{ Session::get('message') }}</p>
    @endif


    <p class="text-center h2" style="color:seagreen; margin-top: 15px">Hello {{$name}}</p>


    <p class="text-center h6" style="text-align:center">Here are your administration options </p>

    <p>Default list:</p>

    <!-- The dashborad options in the center of the page-->

    <ul class="lp" style="margin-left: 220px">
        <li><button class="block button button1" onclick="location.href='/accept/create'" type="button"><span><img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> New Patient Registration Click here to review</span>
            </button></li>
        &nbsp;&nbsp;&nbsp;
        <li><button  class="block button button1" onclick="location.href='/passwordreset/create'" type="button"> <span><img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Password Reset Requests. Click here to review</span>
            </button> </li>
        &nbsp;&nbsp;&nbsp;
        <li> <button  class="block button button1" onclick="location.href='/profilesearch'"> <span><img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> View Summary of Patient</span> </button></li>
        &nbsp;&nbsp;&nbsp;
        <li><a href=""></a> <button class="block button button1" onclick="location.href='/report/create'"><span> <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> Generate Report of PERM and PROM Survey Data</span></button></li>
        &nbsp;&nbsp;&nbsp;
        <!-- Commented out due to not MVP
        <li><a href=""></a> <button  class="block button button1" onclick="location.href='admin_reset_password'"> <span><img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right"> Modify Survey Add or Remove Questions</span></button></li>
        &nbsp;&nbsp;&nbsp;
        -->
        <li><a href=""></a> <button class="block button button1" onclick="location.href='/passwordchangeadmin'"><span><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Change Your Password</span></button></li>
        &nbsp;&nbsp;&nbsp;
        <!--Commented out due to not MVP
        <li><a href=""></a> <button  class="block button button1" onclick="location.href='admin_reset_password'"> <span><img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right"> ADMIN Help</span></button></li>
        &nbsp;&nbsp;&nbsp;
        -->
        <li><button class="block button button1" type="button"><span><img src="{{asset('assets/images/signup.png')}}" width="25" height="25" class="d-inline-block align-right"> Register Admin
                </span></button></li>

    </ul>


    <!-- The dashborad which has all the options for the rootadmin. This dashboard is located in the side of the page-->
    <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <!-- the Dashboard options-->
                    <li class="nav-item">
                        <!-- the Dashboard options-->
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"  href="{{url('.')}}">
                                <img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right"> Dashboard</a></p>
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{ url('/accept/create')}}" >
                                <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Registration</a></p>
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{ url('/passwordreset/create')}}">
                                <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> Password Reset</a></p>
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{ url('/profilesearch')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Summary</a></p>
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{ url('/report/create')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> Generate Report</a></p>
                    </li>
                    <!-- Comment out due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right"> Modify Survey</a></p>
                    </li>
                    -->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{url('/passwordchangeadmin')}}">
                                <img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Change Password</a></p>
                    </li>
                    <!-- Cooment out due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{url('/passwordchangeadmin')}}">
                                <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right">Admin Help</a></p>
                    </li>
                    -->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{ url('/adminregistration')}}">
                                <img src="{{asset('assets/images/signup.png')}}" width="25" height="25" class="d-inline-block align-right"> Register Admin</a></p>
                    </li>
                      <!--Logout Option-->
                      <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href= "{{ url('/logout')}}" ><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Logout</a></p>
                    </li>
                </ul>
            </div>
        </nav>
    </div>



</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</div>
</html>
