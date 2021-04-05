<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title> Patient Registration Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">
    <style>
        .scrollcontainer {
            border: 2px solid #ccc;
            width: 400px;
            height: 125px;
            overflow-y: scroll;
        }

        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }
    </style>
</head>
<div id="wrapper">
    <body>
    <div style="margin-top: .5cm; margin-left: 75px">
        <h2 style="text-align: center;color:seagreen; margin-left: 50px">Welcome To Patient Experience Tracker</h2>
        <p class="text-center h4" style="margin-left: 50px">Create a new account</p>


        <!-- The dashboard which has all the options for the admin. This dashboard is located in the side of the page-->
        <div class="msb" id="msb">
            <p class="text-center fs-2">PET</p>

            <nav class="navbar navbar-default" role="navigation">
                <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                    <ul class="nav flex-column" style="width:100%">
                        <!-- the Dashboard options-->
                        <!-- Home Option-->
                        <li class="nav-item">
                            <p><a class=" text-dark nav-link active" aria-current="page"
                                  href="{{ url('/')}}"><img src="{{asset('assets/images/Home.png')}}"
                                                            width="25" height="25"
                                                            class="d-inline-block align-right"> Home</a>
                            </p>
                        </li>
                        <!-- Sign Up option-->
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page"
                                  href="{{ url('/patientregistration')}}"><img
                                        src="{{asset('assets/images/signup.png')}}" width="25" height="25"
                                        class="d-inline-block align-right"> Sign Up</a></p>
                        </li>
                        <!-- Patient Login option-->
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page"
                                  href="{{ url('/patientlogin')}}"><img
                                        src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                        class="d-inline-block align-right"> Patient Login</a></p>
                        </li>
                        <!-- Administrator Login option-->
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page"
                                  href="{{ url('/adminlogin')}}"><img
                                        src="{{asset('assets/images/key.png')}}" width="22" height="25"
                                        class="d-inline-block align-right"> Administrator Login</a></p>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>



    <!--<form method = "post" action = "">--->
        <form style="width: 600px; margin-left: 35%; margin-top:5%" method="post" action="{{ url('/verifyemail')}}">
            @csrf
            <!-- text box for the new Patient First name-->

            <div class="mb-3 row">
                <div class="col-sm-10">
                    {{Form::label('firstname', 'First Name:')}}
                    {{Form::text('firstName', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'First Name'])}}
                </div>
            </div>
            <!-- text box for the new Patient Last name-->
            <div class="mb-3 row">
                <div class="col-sm-10">
                    {{Form::label('lastname', 'Last Name:')}}
                    {{Form::text('lastName', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'Last Name'])}}
                </div>
            </div>
            <!-- text box for the new Patient DOB-->
            <div class="mb-3 row">
                <div class="col-sm-10">
                    {{Form::label('dob', 'Date of Birth:')}}
                    {{Form::text('dob', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'DOB: dd-mm-yyyy'])}}
                </div>
            </div>
            <!-- text box for the new Patient Weight-->
            <div class="mb-3 row">
                <div class="col-sm-10">
                    {{Form::label('weight', 'Weight:')}}
                    {{Form::number('weight', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'pounds' , 'width' => '25'])}}
                </div>
            </div>
            <!-- text box for the new Patient Height-->
            <div class="mb-3 row">
                <div class="col-sm-10">
                    {{Form::label('height', 'Height:')}}
                    {{Form::number('height', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'cm'])}}
                </div>
            </div>
            <!-- text box for the new Patient Gender-->
            <div class="mb-3 row">
                <div class="col-sm-10">
                    {{Form::label('gender', 'Gender:')}}
                    {{Form::select('gender', ['Male' => 'Male' ,'Female' => 'Female', 'Other' => 'Other'], ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'Gender'])}}
                </div>
            </div>
            <!-- text box for the new Patient Email-->
            <div class="mb-3 row">
                <div class="col-sm-10">
                    {{Form::label('email', 'Email:')}}
                    {{Form::text('email', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'Email'])}}
                </div>
            </div>
            <!-- text box for the new Patient Password-->
            <div class="mb-3 row">
                <div class="col-sm-10">
                    {{Form::label('password', 'Password:')}}
                    {{Form::text('password', '' , ['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'Minimum 6 Characters'])}}
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10">
                    {{Form::label('condition', 'Condition:')}}
                    {!! Form::select('condition',  $conditionList, null,['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'Select Condition']) !!}
                </div>
            </div>
            {{Form::label('medications', 'Select any medications you are taking from this list:')}}
            <div class="panel panel-default">
                <div style="width: 330px;margin-right: 35px;" class="panel-body shadow p-3">

                    <div class="container">
                        <div class="row align-items-start">

                            @foreach ($medicationList as $m)

                                <div style="max-width:300px; overflow-x:auto; whitespace:nowrap;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="medication[]"
                                               value="{{$m}}" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$m}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- submit button-->
            <br>
            <div style="margin-left:4cm; margin-bottom: 20px">
                {{Form::submit('Submit' , ['class' => 'btn btn-success btn-rounded', 'style'=>'margin-left:20px; width:190px; height:30px'])}}
                {!! Form::close() !!}
            </div>
        </form>
    </div>
    </body>
</div>
</html>
