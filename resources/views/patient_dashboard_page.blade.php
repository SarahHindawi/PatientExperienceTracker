<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
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
   
    @if(Session::has('message'))
    <p class="alert alert-info" style="text-align:center">{{ Session::get('message') }}</p>
    @endif


    <p class="text-center fs-2" style="color:seagreen">Hello {{$name}} </p>


    <p class="text-center h6" style="text-align:center">Please select from one of the options below </p>

    <p>Default list:</p>

    <!-- The dashborad options in the center of the page-->
    <div>
    <ul class="lp">
        <li><button class="block" onclick="location.href='/'" type="button"><img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Click here complete a survey.
            </button></li>
        &nbsp;&nbsp;&nbsp;        
        <li><button  class="block" onclick="location.href='/passwordchangepatient'" type="button"> <img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Change Password
            </button> </li>
        &nbsp;&nbsp;&nbsp;             
    </ul>
    </div>


    <!-- The dashborad which has all the options for the Patient. This dashboard is located in the side of the page-->
    <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <!-- the Dashboard options-->
                    <!-- Dashboard Option-->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-center text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/')}}"><img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right">Dashboard</a></p>
                     <!--Survey Option-->
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-center text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/')}}"><img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Complete Survey</a></p>
                    </li>
                    <!-- Password Change Option-->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/passwordchangepatient')}}"><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right">Change Password</a></p>
                    </li>
                    <!--Logout Option-->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href= "{{ url('/logout')}}" ><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right">Logout</a></p>
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