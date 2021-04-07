<!--Here is a page for changing password for Admins when they have to put their old password and the put a new one
 with confirming-->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Admin Password Change</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin_dashboard_page.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">

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
    @if(Session::has('message'))
        <p class="alert alert-info" style="text-align:center; margin-top: -1cm">{{ Session::get('message') }}</p>
    @endif

    <div style="margin-left: -1cm; margin-top: 1cm">

        <!-- the title in the top middle of the page -->
        <div>
            <p class="text-center h2" style="color:seagreen; margin-left: 3.2cm">Change Password</p>

            <p class="text-center h5" style="margin-left: 3.2cm; margin-top: .5cm">Here you can change the password of
                your
                account</p>
        {{--     <p class="text-center h4">See password rules below</p>--}}


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
                                        New
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


            <!-- the form where Admin have to change the password-->
            <form onSubmit="return checkPassword(this)" method="POST" action="{{ url('/passwordchangeadminsave')}}"
                  style="margin-left: -60px">
            @csrf
            <!-- the box for current password-->
                <div style="width: 550px; margin-left:18cm; margin-top:6%">
                    <div class="mb-7 row">
                        <label for="inputFirstName" class="col-sm-4 col-form-label">Current Password: </label>
                        <div class="col-sm-5">
                            <input type="password" style="width:7cm"
                                   class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                                   id="curpass" name="currentpass" required>
                        </div>
                    </div>
                    <!-- the box for new password-->
                    <div class="mb-7 row">
                        <label for="inputFirstName" class="col-sm-4 col-form-label">New Password: </label>
                        <div class="col-sm-5">
                            <input type="password" style="width:7cm"
                                   class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                                   id="pass1" name="password" pattern="^[A-Za-z\d@$!%*+-:,;.?&~/\()=_]{6,}$"
                                   title="Password must include at least 6 characters" required>
                        </div>
                    </div>
                    <!-- the box for new password conformation -->
                    <div class="mb-7 row">
                        <label for="inputFirstName" class="col-sm-4 col-form-label">Confirm New Password: </label>
                        <div class="col-sm-5">
                            <input type="password" style="width:7cm"
                                   class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                                   id="pass2" name="password2" required>
                        </div>
                    </div>
                </div>
                <!-- the panel where the rule of the password creation should achieve-->
            {{--     <div class="card panel-body shadow p-3"--}}
            {{--          style="width: 25rem;height: 15rem;;margin-left: 29cm; margin-top: -6cm;">--}}
            {{--         <div class="card-body">--}}
            {{--             <h6 class="card-subtitle mb-2 text-muted">Password needs to be between 6 and 20 characters</h6>--}}
            {{--             <br><br>--}}
            {{--             <h6 class="card-subtitle mb-2 text-muted">Password Must Contain:</h6>--}}
            {{--             <h6 class="card-subtitle mb-2 text-muted">-At least 1 Uppercase Letter</h6>--}}
            {{--             <h6 class="card-subtitle mb-2 text-muted">-At least 1 Lowercase Letter</h6>--}}
            {{--             <h6 class="card-subtitle mb-2 text-muted">-At least 1 Number</h6>--}}
            {{--         </div>--}}
            {{--     </div>--}}
            {{--     <br><br>--}}
            <!-- the submit button-->
                <div style="margin-left:20cm;">
                    <button class="btn btn-success btn-rounded  btn-lg "
                            style="width: 200px; margin-top: 1cm; margin-left: 1cm">Change Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    </body>
</div>
</html>
