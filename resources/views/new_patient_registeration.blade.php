<!DOCTYPE html>
<html>
<head>
    <title>Confirming Registration Requests</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">

<!--
    <script src="{{ URL::asset('https://kit.fontawesome.com/a076d05399.js') }}" crossorigin='anonymous'></script>
    -->

    <style>
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        [type=radio] + img {
            cursor: pointer;
        }

        [type=radio]:checked + img {
            outline: 2px solid #f00;
        }

        .btn-success:hover {
            color: rgb(255, 255, 255);
            background: rgba(44, 92, 44, 0.75);
            border: 2px solid rgba(38, 83, 38, 0.75);
        }

        .btn-success {
            font-size: 13px;
            color: rgba(45, 87, 45, 0.75);
            letter-spacing: 1px;
            line-height: 15px;
            border: 2px solid rgba(48, 80, 48, 0.75);
            border-radius: 40px;
            background: transparent;
            transition: all 0.3s ease 0s;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }

        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }

    </style>

</head>
<div id="wrapper">

    <body style="overflow-x: hidden">

    <section class="container-fluid" style="margin-left: -1cm; margin-top: 1cm">


        <div style="margin-left: 3cm">
            <!--The page header and an explanation for how to use the page -->
            <p class="text-center h2" style="color:seagreen;margin-left: 3cm">New Patient Registration</p>

        @if (count($patients) > 0)

            <!-- padding-right: 500px-->
                <p class="text-center h6" style="text-align:center; margin-left: 3cm;margin-top:1cm">Selecting the green check marks will approve new patients and they will be added to the system. </p>
            @endif
            <br>
            <br>
            <br>
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


        <!-- list of new patients requests-->

        <div style="position:absolute; top:205px; width: 1220px;">


        <ol class="lp" style="margin-bottom: 5px">
            @foreach ($patients as $p)
                <li style="font-size:20px"> {{$p}}</li>

                <br> <br>
            @endforeach
        </ol>
        </div>
        <div style="margin-left: 300px; position:absolute; top:205px; width: 1220px;">

            <!-- If there are no new patients, then don't print a list -->
            @if (count($patients) > 0)

                <form name="acceptanceForm" method="post" action="/accept" enctype="multipart/form-data" class="lp">
                    @csrf
                    <ol class="lp">

                        @foreach ($patients as $p)
                            <ul>
                                <label style="margin-right: 10px;">
                                    <input type="radio" name="data[{{$p}}]" value="Accept">
                                    <img width="30" height="30"
                                         src="{{asset('assets/images/checkmark.png')}}">
                                </label>

                                <label>
                                    <input type="radio" name="data[{{$p}}]" value="Remove">
                                    <img width="30" height="30"
                                         src="{{asset('assets/images/x.png')}}">
                                </label>
                            </ul>
                            <br> <br>
                        @endforeach
                    </ol>

                    <button style="width: 5cm; margin-top: 8px; margin-left: 25px" type="submit"
                            class="btn btn-success btn-rounded">Save
                    </button>
                </form>
            @else
                {{--                <h5 style="margin-left: 277px; color: red">There are no new registered patients </h5>--}}
                <div class="alert" style="margin-left: 10.3cm; margin-top: 13px; width: 370px">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong> There are no new registered patients </strong>
                </div>
            @endif
        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
            integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
            integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
            crossorigin="anonymous"></script>
    </body>
</div>
</html>

