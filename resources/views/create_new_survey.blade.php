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
    <body style="margin-top: 1cm; margin-left: -2cm; overflow-x: hidden">
    <section class="container-fluid">
        @isset($message)
            <p class="alert alert-info" style="text-align:center; margin-top: -1cm; margin-left: 200px; width: 91%">{{ $message}}</p>
    @endisset


    <!-- the title in the top  -->
        <div style=" margin-top:5%; margin-left: 50px">
            <p class="text-center h2" style="color:seagreen; margin-top: -1cm; margin-left: 4cm">Create a New Survey</p>

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
                                      href="{{ url('/addsurvey/create')}}"><img
                                            src="{{asset('assets/images/survey.png')}}"
                                            width="25" height="25"
                                            class="d-inline-block align-right"> Create
                                        New Survey</a></p>
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

            <form style="width: 600px; margin-left:16.7cm; margin-top:7%" method="post" enctype="multipart/form-data"
                  action="{{ url('/addsurvey')}}">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-9 col-form-label">Survey Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control shadow-sm" name="SurveyName"
                               style="width: 400px; height: 40px" required>
                    </div>
                </div>
                <!-- Text box for the condition served by the survey -->
                <div class="mb-3 row">
                    <label class="col-sm-9 col-form-label">Condition Served:</label>
                    <div class="col-sm-10">
                        <select class="shadow  bg-body rounded" aria-label="Default select example"
                                name="ConditionServed"
                                style="width: 250px; height: 30px" required>
                            @foreach ($conditions as $c)
                                <option value="{{$c}}">{{$c}}</option>
                            @endforeach
                            <option value="Admin">Physician Survey(Admin only)</option>
                        </select>

                    </div>
                    <!-- Text box for the type of the survey (PROM/PREM) -->
                    <div style="margin-top: 33px">
                        <label>Survey Type:</label>
                        <br>
                        <label style="clear: none"><input type="radio" name="SurveyType" value="PROM" checked>
                            PROM</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <label style="clear: none"><input type="radio" name="SurveyType" value="PREM"> PREM</label>
                    </div>
                </div>

                <div style="margin-left:2.2cm; margin-top:55px; width: 150Px">
                    <button style="width: 200px;" type="submit" class="btn btn-success btn-rounded">Create</button>
                </div>

            </form>
        </div>

    </section>
    </body>
</div>
</html>
