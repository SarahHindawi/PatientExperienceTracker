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
    
    <style>
        #wrapper {
            margin-left:auto;
            margin-right:auto;
            width:1519px;
        }
    </style>

</head>
<div id="wrapper">
<!-- the body has the content of the page  -->
<body style="margin-top: 1cm; margin-left: -1cm">


<!-- the title in the top  -->
<div style=" margin-top:2%; margin-left:10%">
    <p class="text-center h2"style="color:seagreen; margin-top: 10px; margin-left: 1cm">Register a New Admin Account</p>
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
                          href= "{{ url('/addsurvey/create')}}" ><img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right"> Create New Survey</a></p>
                </li>


                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/editSurveySelect')}}">
                            <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right"> Modify a Survey</a></p>
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

<!-- form to put the name, last name and email of the new admin-->
<form style="width: 600px; margin-left:40%; margin-top:5%" method="post" action="{{ url('/adminregistration')}}">
    @csrf
    <!-- text box for the new Admin First name-->
    <div class="mb-3 row">
        <div class="col-sm-10">
            {{Form::label('firstname', 'First Name:')}}
            {{Form::text('firstname', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'First Name'])}}
        </div>
    </div>
    <!-- text box for the new Admin Last name-->
    <div class="mb-3 row">
        <div class="col-sm-10">
            {{Form::label('lastname', 'Last Name:')}}
            {{Form::text('lastname', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'Last Name'])}}
        </div>
    </div>
    <!-- text box for the new Admin Password-->
    <div class="mb-3 row">
        <div class="col-sm-10">
            {{Form::label('password', 'Password:')}}
            {{Form::text('password', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'Password'])}}
        </div>
    </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                {{Form::label('email', 'Email:')}}
                {{Form::text('email', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'Email'])}}
            </div>
        </div>
    <!-- submit button-->
    <br><div style="margin-left:4cm">
            {{Form::submit('Submit' , ['class' => 'btn btn-success btn-rounded', 'style'=>'margin-left:20px; width:190px; height:30px'])}}
            {!! Form::close() !!}
    </div>
</form>


</body>
</div>
</html>
