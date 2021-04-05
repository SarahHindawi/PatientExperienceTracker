<!-- this page where admins will put info about a patient and a profile summary about him/her-->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Patient Report Search</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">
    <style>
        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }
    </style>
</head>
<!-- the body has the content of the page  -->
<div id="wrapper">
    <body  style="margin-top: 1cm">

    @if(isset($message))
        <p class="alert alert-info" style="text-align:center;margin-top: -1cm; margin-left: 57px; width: 96.8%">{{ $message}}</p>
    @endif

    <!-- the title in the top  -->
    <div style=" margin-left:4%">
        <p class="text-center h2 " style="color:seagreen; margin-left: 30px">Patient Profile Search</p>
    </div>

    <!-- The dashboard which has all the options for the admin. This dashboard is located in the side of the page-->
    <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <li class="nav-item">
                        <!-- the Dashboard options-->
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/')}}">
                                <img src="{{asset('assets/images/Home.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Dashboard</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/accept/create')}}">
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
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/profilesearch')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Patient Summary</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/report/create')}}">
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


                    <!--Logout Option-->
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{ url('/logout')}}"><img
                                    src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                    class="d-inline-block align-right"> Logout</a></p>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


    <form method="post" action="/profilereport" enctype="multipart/form-data"
          style="width: 600px; margin-left:15%; margin-top:8%">
    @csrf
    <!-- Text box for a patient email that admins will look for -->
        <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control shadow p-2  bg-body rounded" name="inputEmail" required>
                <div style="margin-left:130%; margin-top:-7%; width: 150Px">
                    <button style="width: 200px;" type="submit" class="btn btn-success btn-rounded">Search By Email
                    </button>
                </div>
            </div>
        </div>
    </form>
    <!-- Text box for a patient first name that admins will look for -->
    <form method="post" action="/profilereportName" enctype="multipart/form-data"
          style="width: 600px; margin-left:15%; margin-top: 2cm">
        @csrf
        <div class="mb-3 row">
            <label for="inputFirstName" class="col-sm-2 col-form-label">First Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control shadow p-2  bg-body rounded" name="inputFirstName">
                <div style="margin-left:130%; margin-top:-7%; width: 150Px">
                    <button style="width: 200px;" type="submit" class="btn btn-success btn-rounded">Search By Name
                    </button>
                </div>
            </div>
        </div>
        <!-- Text box for a last first name that admins will look for -->
        <div class="mb-3 row">
            <label for="inputLastName" class="col-sm-2 col-form-label ">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control shadow p-2  bg-body rounded" name="inputLastName">
            </div>
        </div>
    </form>

    </body>
</div>
</html>
