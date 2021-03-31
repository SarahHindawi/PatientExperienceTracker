<!--Here is a page for changing password for Admins when they have to put their old password and the put a new one
 with confirming-->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Admin Password Change</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./cssFile.css">
    <style>
        #wrapper {
            margin-left:auto;
            margin-right:auto;
            width:1519px;
        }
    </style>

</head>
<!-- the body has the content of the page  -->
<div id="wrapper">

<body>
<!-- the navigation bar in the top-->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
{{--        <a class="navbar-brand"></a>--}}
{{--        <!-- the button of the the drop down for the user in the top right corner-->--}}
{{--        <form class="d-flex">--}}
{{--            <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button"--}}
{{--                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                Dropdown--}}
{{--            </button>--}}
{{--            <!-- the option of the drop down button-->--}}
{{--            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">--}}
{{--                <li><button class="dropdown-item" type="button">Action</button></li>--}}
{{--                <li><button class="dropdown-item" type="button">Another action</button></li>--}}
{{--                <li><button class="dropdown-item" type="button">Something else here</button></li>--}}
{{--            </ul>--}}
{{--        </form>--}}
    </div>
</nav>
<!-- the title in the top middle of the page -->
<div style=" margin-top:4%; margin-left:5cm">
    <p class="text-center h4">Here you can change the password on your account.</p>
    <p class="text-center h4">See password rules below</p>
</div>


<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>

    <nav class="navbar navbar-default" role="navigation">
        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
            <ul class="nav flex-column" style="width:100%">
                <li class="nav-item">
                    <!-- the Dashboard options-->
                    <p><a class="text-dark nav-link active" aria-current="page"  href="{{ url('/')}}" >
                            <img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right"> Dashboard</a></p>
                </li>
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/accept/create')}}" >
                            <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Registration</a></p>
                </li>
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/passwordreset/create')}}">
                            <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right"> Password Reset</a></p>
                </li>
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/profilesearch')}}">
                            <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Summary</a></p>
                </li>
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/report/create')}}">
                            <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right"> Generate Report</a></p>
                </li>
            <!-- Comment Out due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Modify Survey</a></p>
                    </li>
                    -->
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page" href="{{url('/passwordchangeadmin')}}">
                            <img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Change Password</a></p>
                </li>
            <!-- Comment Out Due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right">Admin Help</a></p>
                    </li>
                    -->
                <!--Logout Option-->
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page"
                                              href= "{{ url('/logout')}}" ><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Logout</a></p>
                </li>
            </ul>
        </div>
    </nav>
</div>


<!-- the form where Admin have to change the password-->
<form>
    <!-- the box for current password-->
    <div style="width: 550px; margin-left:6cm; margin-top:6%">
        <div class="mb-7 row">
            <label for="inputFirstName" class="col-sm-4 col-form-label">Current Password: </label>
            <div class="col-sm-5">
                <input type="password" style="width:7cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                       id="inputFirstName">
            </div>
        </div>
        <!-- the box for new password-->
        <div class="mb-7 row">
            <label for="inputFirstName" class="col-sm-4 col-form-label">New Password: </label>
            <div class="col-sm-5">
                <input type="password" style="width:7cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                       id="inputFirstName">
            </div>
        </div>
        <!-- the box for new password conformation -->
        <div class="mb-7 row">
            <label for="inputFirstName" class="col-sm-4 col-form-label">Confirm New Password: </label>
            <div class="col-sm-5">
                <input type="password" style="width:7cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                       id="inputFirstName">
            </div>
        </div>
    </div>
    <!-- the panel where the rule of the password creation should achieve-->
    <div class="card panel-body shadow p-3"
         style="width: 25rem;height: 15rem;;margin-left: 29cm; margin-top: -6cm;">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Password needs to be between 8 and 20 characters</h6>
            <br><br>
            <h6 class="card-subtitle mb-2 text-muted">Password Must Contain:</h6>
            <h6 class="card-subtitle mb-2 text-muted">-Rule 1</h6>
            <h6 class="card-subtitle mb-2 text-muted">-Rule 2</h6>
            <h6 class="card-subtitle mb-2 text-muted">-Rule 3</h6>
        </div>
    </div>
    <br><br>
    <!-- the submit button-->
    <div style="margin-left:20cm;">
        <button style="width: 200px;" type="button" class="btn btn-success btn-rounded">Submit</button>
    </div>
</form>



</body>
</div>
</html>
