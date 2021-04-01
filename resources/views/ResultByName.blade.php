<!-- this page where admins will show the result of matching names of patient when you do a search with their names-->
<!DOCTYPE html>
<html>
<head>
    <!--<title>Patient Report Search</title>!-->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">
    <style>
        #wrapper {
            margin-left:auto;
            margin-right:auto;
            width:1519px;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 4px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

</head>
<div id="wrapper">
<body>

<div style=" margin-top:5%; margin-left:10%">
    <p class="text-center h3">We Found These Matching Names</p>
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
<!--the table that will show you the result names-->
<div style="margin-left: 10cm;margin-top: 2cm">
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Disease</th>
            <th>Email</th>
            <th>Summary</th>

        </tr>
        <tr>
            <td>Jack</td>
            <td>Futterkiste</td>
            <td>56</td>
            <td>Blood Presure</td>
            <td>Jack@gmail.com</td>
            <td><button type="button" class="btn btn-secondary">Summary</button>
            </td>
        </tr>

        <tr>
            <td>Jack</td>
            <td>Futterkiste</td>
            <td>56</td>
            <td>Blood Presure</td>
            <td>Jack@gmail.com</td>
            <td><button type="button" class="btn btn-secondary">Summary</button>
            </td>
        </tr>
    </table>
</div>

</body>
</div>
</html>
