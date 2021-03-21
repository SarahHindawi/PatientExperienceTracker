<!-- this page is where root user will be able to register new admins to the system-->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Register a New Admin Account</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">

</head>

<!-- the body has the content of the page  -->
<body>
<!-- the navigation bar in the top-->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand"></a>
        <!-- the button of the the drop down for the user in the top right corner-->
        <form class="d-flex">
            <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button"
                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </button>
            <!-- the option of the drop down button-->
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><button class="dropdown-item" type="button">Action</button></li>
                <li><button class="dropdown-item" type="button">Another action</button></li>
                <li><button class="dropdown-item" type="button">Something else here</button></li>
            </ul>
        </form>
    </div>
</nav>

<!-- the title in the top  -->
<div style=" margin-top:5%; margin-left:10%">
    <p class="text-center h2">Register a New Admin Account</p>
</div>

<!-- the Dashboard of the page that has different options-->
<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>

    <nav class="navbar navbar-default" role="navigation">
        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
            <ul class="nav flex-column" style="width:100%">
                <!-- the Dashboard options-->
                <li class="nav-item">
                    <!-- the Dashboard options-->
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"  href="#">
                            <img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right">Dashboard</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right">Patient Registration</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right">Password Reset</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right">Patient Summary</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right">Generate Report</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Modify Survey</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right">Change Password</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right">Admin Help</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="/RegisterAdmin.html">
                            <img src="{{asset('assets/images/signup.png')}}" width="25" height="25" class="d-inline-block align-right">Register Admin</a></p>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- form to put the name, last name and email of the new admin-->
<form style="width: 600px; margin-left:16cm; margin-top:7%">
    <!-- text box for the new Admin First name-->
    <div class="mb-3 row">
        <label for="inputFirstName" class="col-sm-2 col-form-label">First Name </label>
        <div class="col-sm-10">
            <input type="text" style="width:10cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded" id="inputFirstName">
        </div>
    </div>
    <!-- text box for the new Admin Last name-->
    <div class="mb-3 row">
        <label for="inputLastName" class="col-sm-2 col-form-label ">Last Name</label>
        <div class="col-sm-10">
            <input type="text" style="width:10cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded" id="inputLastName">
        </div>
    </div>
    <!-- text box for the new Admin Email-->
    <div class="mb-3 row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" style="width:10cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded" id="inputEmail">
        </div>
    </div>
    <!-- submit button-->
    <br><div style="margin-left:4cm">
        <button style="width: 200px;" type="button" class="btn btn-success btn-rounded">Submit</button>
    </div>
</form>

</body>

</html>
