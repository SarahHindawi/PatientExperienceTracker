<!DOCTYPE html>
<html>
<head>
    <title>Root Admin Dashboard</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin_dashboard_page.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!--Get your own code at fontawesome.com
        Here is the link to find all the important iconsclicking the green checkmark will approve the
    https://www.w3schools.com/icons/icons_reference.aspPlease review password reset requests.After review
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

<section class="container-fluid" style="margin-top: 1cm">

    <p class="text-center h2" style="padding-right: 600px" >Hello Mystery Admin</p>


    <p  class="text-center h6" style="text-align:right; padding-right: 500px">Here are your administration option </p>

    <p>Default list:</p>

    <!-- The dashboard options in the centere of the page-->

    <ul class="lp">
        <li><button class="block" onclick="location.href='new_patient_registeration'" type="button"><i class='fas fa-user-plus'></i> New Patient Registration Click here to review
            </button></li>
        &nbsp;&nbsp;&nbsp;
        <li><button  class="block" onclick="location.href='admin_reset_password'" type="button"> <i class='fas fa-user-lock'></i> Patient Password Reset Requests. Click here to review
            </button> </li>
        &nbsp;&nbsp;&nbsp;
        <li><a href=""></a> <button  class="block"> <i class='fas fa-pen'></i> View Summary of Patient</button></li>
        &nbsp;&nbsp;&nbsp;
        <li><a href=""></a> <button class="block"> <i class='fas fa-pen'></i> Generate Report of PERMS and PROMS Survey Data</button></li>
        &nbsp;&nbsp;&nbsp;
        <li><a href=""></a> <button  class="block"> <i class='far fa-file-alt' style='font-size:24px'></i> Modify Survey Add or Remove Questions</button></li>
        &nbsp;&nbsp;&nbsp;
        <li><a href=""></a> <button class="block" ><i class='fas fa-key'></i> Change Your Password</button></li>
        &nbsp;&nbsp;&nbsp;
        <li><a href=""></a> <button  class="block"> <i class='fas fa-question'></i> ADMIN Help</button></li>
        &nbsp;&nbsp;&nbsp;
        <li><button class="block" type="button"><i class='fas fa-user-plus'></i> Register Admin
            </button></li>

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
                        <p ><a class="text-dark nav-link active" aria-current="page"  href="#">
                                <img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right"> Dashboard</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/accept/create')}}" >
                                <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Registration</a></p>
                    </li>
                    <li class="nav-item">
                        <p ><a class="text-dark nav-link active" aria-current="page" href="{{ url('/passwordreset/create')}}">
                                <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> Password Reset</a></p>
                    </li>
                    <li class="nav-item">
                        <p ><a class="text-dark nav-link active" aria-current="page" href="{{ url('/profilesearch')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Summary</a></p>
                    </li>
                    <li class="nav-item">
                        <p ><a class="text-dark nav-link active" aria-current="page" href="{{ url('/report/create')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> Generate Report</a></p>
                    </li>
                    <li class="nav-item">
                        <p ><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right"> Modify Survey</a></p>
                    </li>
                    <li class="nav-item">
                        <p ><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Change Password</a></p>
                    </li>
                    <li class="nav-item">
                        <p ><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right"> Admin Help</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/adminregistration')}}">
                                <img src="{{asset('assets/images/signup.png')}}" width="25" height="25" class="d-inline-block align-right"> Register Admin</a></p>
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
