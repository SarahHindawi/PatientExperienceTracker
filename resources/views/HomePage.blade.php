<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/cssFile.css')}}">
    <style>
        #wrapper {
            margin-left:auto;
            margin-right:auto;
            width:1519px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Default</a>
    </div>
</nav>

<div style=" margin-top:5%; margin-left:10%">
    <h3 style = "color:seagreen; text-align:center;">Welcome to The Patient Experience Tracker</h3>
    <p style = "color:red; text-align:center;">Select a Option From Below</p>
</div>


<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>

    <nav class="navbar navbar-default" role="navigation">
        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
            <ul class="nav flex-column" style="width:100%">
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page"
                                              href="#">
                                       <img src = "signup.png" width="25" height="25" class="d-inline-block align-right">     signup
                                            </a></p>
                </li>
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page" href="#">
                        <img src = "key.png" width="25" height="25" class="d-inline-block align-right"> Patient Login
                            </a></p>
                </li>
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page"
                                              href="#">
                                              <img src = "key.png" width="22" height="25" class="d-inline-block align-right"> Administrator Login
                                            </a></p>
                </li>
            </ul>
        </div>

    </nav>
</div>


<a href = "https://www.google.ca/">
    <img src="sign.png" class="rounded float-end" alt="Admin Login">
 </a>

<a href = "https://www.google.ca/">
<img src="patient.png" class="rounded mx-auto d-block" alt="Admin Login">
</a>


<a href = "https://www.google.ca/">
    <img src="admin.png" class="rounded mx-auto d-block" alt="Admin Login">
    </a>
</body>

</html>
