<!DOCTYPE html>
<html>
<head>
    <title>Report Result</title>

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
            white-space:normal;
            font-size: 13px;
        }

        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }

        body{
            overflow: hidden;
        }

    </style>
    <!--
    <script src="{{ URL::asset('https://kit.fontawesome.com/a076d05399.js') }}" crossorigin='anonymous'></script>
    -->
</head>
<div id="wrapper">
    <body>

    <section class="container-fluid" style="margin-top: 1cm">

        <!--The page header -->
        <div id="wrapper">
            <p class="text-center h2" style="margin-top: 20px; margin-right: -95px; color: seagreen">Report Result</p>


            <div class="cent" style="top: 350px; width:80em;overflow-x: auto;white-space: nowrap; margin-left: -125px; margin-top: -5.8cm; margin-bottom: 10px">
                <table>
                    <tr>
                        <th><div style="width: 130px">Name</div></th>
                        <th>Email Address</th>
                        <th style="width:100px">Date Completed</th>

                    @foreach ($questions as $q)
                            <th style = "min-width: 300px; max-width: 300px;">{{$q["Text"]}}</th>
                        @endforeach
                    </tr>


                    @foreach ($emails as $p)
                        <tr>
                            <td>{{ $names[$loop->index] }}</td>
                            <td>{{ $emails[$loop->index] }}</td>
                            <td>{{ $dates[$loop->index] }}</td>

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
            </div>
            <div>
            <form method="post" action="/report/download" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="fileName" value="{{$fileName}}">
                <button style="width: 4cm; margin-left: 80%; margin-top: -70px; "
                        class="btn btn-success btn-rounded"><img
                            src="{{asset('assets/images/save.png')}}" width="25" height="25"
                            class="d-inline-block align-right" style="margin-left: -10px"> Save </button>

            </form>
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

