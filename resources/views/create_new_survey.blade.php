<!-- this page is where root user will be able to register new admins to the system-->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Create a New Survey</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">
    <style>
        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }
    </style>

</head>
<div id="wrapper">
    <!-- the body has the content of the page  -->
    <body>
    <section class="container-fluid">
        @if(Session::has('message'))
            <p class="alert alert-info" style="text-align:center">{{ Session::get('message') }}</p>
    @endif


    <!-- the title in the top  -->
    <div style=" margin-top:5%;">
        <p class="text-center h2">Create a New Survey</p>
    </div>

    <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <!-- the Dashboard options-->
                    <li class="nav-item">
                        <!-- the Dashboard options-->
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{url('.')}}">
                                <img src="{{asset('assets/images/Home.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Dashboard</a></p>
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/accept/create')}}">
                                <img src="{{asset('assets/images/request.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Patient Registration</a></p>
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/resetreview/create')}}">
                                <img src="{{asset('assets/images/request.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Password Reset</a></p>
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/profilesearch')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Patient Summary</a></p>
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/report/create')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Generate Report</a></p>
                    </li>
                <!-- Comment out due to not MVP
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Modify Survey</a></p>
                </li>
                -->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{url('/passwordchangeadmin')}}">
                                <img src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Change Password</a></p>
                    </li>
                <!-- Cooment out due to not MVP
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{url('/passwordchangeadmin')}}">
                            <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right">Admin Help</a></p>
                </li>
                -->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/adminregistration')}}">
                                <img src="{{asset('assets/images/signup.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Register Admin</a></p>
                    </li>
                    <!--Logout Option-->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/logout')}}"><img
                                    src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                    class="d-inline-block align-right"> Logout</a></p>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <form style="width: 600px; margin-left:10cm; margin-top:7%" method="post" enctype="multipart/form-data"
          action="{{ url('/addsurvey')}}">
        @csrf
        <div class="mb-3 row">
            <label class="col-sm-9 col-form-label">Survey Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control shadow-sm" name="SurveyName">
            </div>
        </div>
        <!-- Text box for the condition served by the survey -->
        <div class="mb-3 row">
            <label class="col-sm-9 col-form-label">Condition Served </label>
            <div class="col-sm-10">
                <input type="text" class="form-control shadow-sm" name="ConditionServed">
                <!-- the search button -->
                <div style="margin-left:130%; margin-top:-7%; width: 150Px">
                    <button style="width: 200px;" type="submit" class="btn btn-success btn-rounded">Create</button>
                </div>
            </div>
        </div>
        <!-- Text box for the type of the survey (PROM/PREM) -->
        <div class="mb-3 row">
            <label class="col-sm-9 col-form-label ">Survey Type</label>
            <label><input type="radio" name="SurveyType" value="PROM" checked> PROM</label>
            <label><input type="radio" name="SurveyType" value="PREM"> PREM</label>
        </div>
    </form>
    </body>
</div>
</html>
