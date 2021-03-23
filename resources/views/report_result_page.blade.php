<!DOCTYPE html>
<html>
<head>
    <title>Report_Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/report_result_page.css')}}">

    <style>
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;

        }

        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }

    </style>
    <script src="{{ URL::asset('https://kit.fontawesome.com/a076d05399.js') }}" crossorigin='anonymous'></script>
</head>
<div id="wrapper">
    <body>

    <section class="container-fluid">

        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid" style="height: 30px; width: 800px">
                {{--                <a class="navbar-brand" href="#">Default</a>--}}
                {{--                <form class="d-flex">--}}
                {{--                    <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button"--}}
                {{--                            id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">--}}
                {{--                        <!-- The drop down button for the user with many options-->--}}
                {{--                        <i class="fa fa-user"></i> Mystery Admin--}}
                {{--                    </button>--}}
                {{--                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">--}}
                {{--                        <li>--}}
                {{--                            <button class="dropdown-item" type="button">Action</button>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <button class="dropdown-item" type="button">Another action</button>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <button class="dropdown-item" type="button">Something else here</button>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </form>--}}
            </div>
        </nav>
        <!--The page header -->
        <div id="wrapper">
            <p class="text-center h2">Report Result</p>


            <div class="cent" style="margin-top: -566px; width:60em;overflow-x: auto;white-space: nowrap;">
                <table>
                    <tr>
                        <th style="width:150px">Name</th>
                        <th>Email Address</th>
                        <th style="width:100px">Date Completed</th>

                    @foreach ($questions as $q)
                            <th>{{$q["Text"]}}</th>
                        @endforeach
                    </tr>


                    @foreach ($emails as $p)
                        <tr>
                            <td>{{ $names[$loop->index] }}</td>
                            <td>{{ $emails[$loop->index] }}</td>
                            <td style="">{{ $dates[$loop->index] }}</td>

                        @foreach ($questions as $q)
                                @if(array_key_exists($q['Text'],$responses[$loop->parent->index]))
                                    <td>{{$responses[$loop->parent->index][$q['Text']]}}</td>
                                @else
                                    <td>N/A</td>

                                @endif
                            @endforeach
                        </tr>
                    @endforeach

                </table>                

                <!-- this button is to save the file-->
                {{--            <button class="greenbutton" onclick="window.print();" style="margin: 3%"><i class='fas fa-save'></i> Save to file--}}
                {{--            </button>--}}
            </div>
            <div class="cent" style="margin-top: -750px">
            <a style="text-decoration: none; margin-left: -235px" href="{{ url('/report/create')}}">
                <button style="width: 5cm; margin-bottom:1cm; margin-top: 10px; margin-left:270px"
                        class="btn btn-success btn-rounded">Back
                </button>
            </a>
        </div>
        </div>


        <!-- The dashboard which has all the options for the admin. This dashboard is located in the side of the page-->
        <div class="msb" id="msb">
            <p class="text-center fs-2">PET</p>

            <nav class="navbar navbar-default" role="navigation">
                <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                    <ul class="nav flex-column" style="width:100%">
                        <li class="nav-item">
                            <!-- the Dashboard options-->
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                      href="{{ url('/')}}">
                                    <img src="{{asset('assets/images/Home.png')}}" width="25" height="25"
                                         class="d-inline-block align-right">Dashboard</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                      href="{{ url('/accept/create')}}">
                                    <img src="{{asset('assets/images/request.png')}}" width="25" height="25"
                                         class="d-inline-block align-right">Patient Registration</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                      href="{{ url('/passwordreset/create')}}">
                                    <img src="{{asset('assets/images/request.png')}}" width="25" height="25"
                                         class="d-inline-block align-right">Password Reset</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                      href="{{ url('/profilesearch')}}">
                                    <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                         class="d-inline-block align-right">Patient Summary</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                      href="{{ url('/report/create')}}">
                                    <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                         class="d-inline-block align-right">Generate Report</a></p>
                        </li>
                    <!-- Comment Out due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Modify Survey</a></p>
                    </li>
                    -->
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                      href="{{url('/passwordchangeadmin')}}">
                                    <img src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                         class="d-inline-block align-right">Change Password</a></p>
                        </li>
                    <!-- Comment Out Due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right">Admin Help</a></p>
                    </li>
                    -->
                        <!--Logout Option-->
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                      href="{{ url('/logout')}}"><img
                                        src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                        class="d-inline-block align-right">Logout</a></p>
                        </li>
                    </ul>
                </div>

            </nav>
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

