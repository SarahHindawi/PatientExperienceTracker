<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin_dashboard_page.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!--Get your own code at fontawesome.com
        Here is the link to find all the important icons
    https://www.w3schools.com/icons/icons_reference.asp
    -->
</head>
<body>

<section class="container-fluid">

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand"></a>
            <form class="d-flex">
                <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i> Mystery Admin
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><button class="dropdown-item" type="button">Action</button></li>
                    <li><button class="dropdown-item" type="button">Another action</button></li>
                    <li><button class="dropdown-item" type="button">Something else here</button></li>
                </ul>
            </form>
        </div>
    </nav>

    <p class="text-center fs-2">Hello Mystery Admin</p>


    <p class="text-center h6" style="text-align:center">Here are your administration option </p>

    <p>Default list:</p>

    <!-- The dashborad options in the centere of the page-->

    <ul class="lp">
        <li><button class="block" onclick="location.href='new_patient_registeration'" type="button"><i class='fas fa-user-plus'></i> New Patient Registeration Click here to review
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
    </ul>


    <!-- The dashborad which has all the options for the admin. This dashboard is located in the side of the page-->
    <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <li class="nav-item">
                        <p class="text-center"><a class="text-center text-dark nav-link active" aria-current="page" href="admin_dashboard_page.html"><i class='fas fa-home'></i>Dashboard</a></p>
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="new_patient_registeration.html"><i class='fas fa-user-plus'></i>Patient Registeration</a></p>
                    </li>
                    <li class="nav-item">
                        <p  class="text-center"><a class="text-dark nav-link active" aria-current="page" href="admin_reset_password.html"> <i class='fas fa-user-lock'></i>Password Reset</a></p>
                    </li>
                    <li class="nav-item">
                        <p  class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#"><i class='fas fa-pen'></i>Patient Summary</a></p>
                    </li>
                    <li class="nav-item">
                        <p  class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#"><i class='fas fa-pen'></i>Generate Report</a></p>
                    </li>
                    <li class="nav-item">
                        <p  class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#"><i class='far fa-file-alt' style='font-size:24px'></i> Modify Survey</a></p>
                    </li>
                    <li class="nav-item">
                        <p  class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#"><i class='fas fa-key'></i>Change Password</a></p>
                    </li>
                    <li class="nav-item">
                        <p  class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#"><i class='fas fa-question'></i>ADMIN Help</a></p>
                    </li>
                    &nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <p  class="text-center"> <i class='fas fa-plus' style='font-size:48px;color:red'></i></p>
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
</html>
