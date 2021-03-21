<!-- this page will show the summary results for a patient-->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Summary Result</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">

    <style>
        table, th, td {
            border: 1px solid black;
            padding: 15px;
            text-align: center;
        }
    </style>

</head>
<!-- the body has the content of the page  -->
<body>
<!-- the navigation bar in the top-->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand"></a>
        <!-- the button of the the drop down for the user in the top right corner-->
        <form class="d-flex">
            <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button"
                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </button>
            <!-- the option of the drop down button-->
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li>
                    <button class="dropdown-item" type="button">Action</button>
                </li>
                <li>
                    <button class="dropdown-item" type="button">Another action</button>
                </li>
                <li>
                    <button class="dropdown-item" type="button">Something else here</button>
                </li>
            </ul>
        </form>
    </div>
</nav>


<!-- the Dashboard of the page that has different options-->
<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>

    <nav class="navbar navbar-default" role="navigation">
        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
            <ul class="nav flex-column" style="width:100%">

                <!-- the Dashboard options-->
                <li class="nav-item">
                    <!-- the Dashboard options-->
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"  href="#">
                            <img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right">Dashboard</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{ url('/accept/create')}}" >
                            <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right">Patient Registration</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{ url('/passwordreset/create')}}">
                            <img src="{{asset('assets/images/request.png')}}" width="25" height="25" class="d-inline-block align-right">Password Reset</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{ url('/profilesearch')}}">
                            <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right">Patient Summary</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{ url('/report/create')}}">
                            <img src="{{asset('assets/images/pen.png')}}" width="25" height="25" class="d-inline-block align-right">Generate Report</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Modify Survey</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right">Change Password</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right">Admin Help</a></p>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- the title in the top  -->
<div style=" margin-top:2%; margin-left:16%">
    <p class="h3">Here is the patient summary for {{$Summary['FirstName']}} {{$Summary['LastName']}}</p>
</div>
<div style=" margin:17%; margin-top:3%;">
    <!-- text box -->
    <h2 class="form-control shadow-lg" style="margin-top:0.3cm;width: 7cm;"
        id="exampleFormControlInput1"><strong>First Name: </strong>{{$Summary['FirstName']}}</h2>

    <h2 class="form-control shadow-lg" style="margin-top:0.3cm;width: 7cm;"
        id="exampleFormControlInput1"><strong>Last Name: </strong>{{$Summary['LastName']}}</h2>

    <h2 class="form-control shadow-lg" style="margin-top:0.3cm;width: 7cm;"
        id="exampleFormControlInput1"><strong>Email: </strong>{{$Summary['email']}}</h2>

    <h2 class="form-control shadow-lg" style="margin-top:0.3cm;width: 7cm;"
        id="exampleFormControlInput1"><strong>Date of Birth: </strong>{{$Summary['DOB']}}</h2>

    <h2 class="form-control shadow-lg" style="margin-top:0.3cm;width: 7cm;"
        id="exampleFormControlInput1"><strong>Gender: </strong>{{$Summary['Gender']}}</h2>

    <!-- text box to show the condition -->
    @isset($Condition)
    <div class="mb-1 row">
        <label for="inputLastName" class="col-sm-1 col-form-label " style="margin-top:0.3cm;">Condition:</label>
        <div class="col-sm-10">
            <h2 type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 4.7cm;"
                id="exampleFormControlInput4">{{$Summary['Condition']}}</h2>
        </div>
    </div>
    @endisset

    <!-- text box to show the Medication -->
    @isset($medications)
        <div class="mb-1 row">
            <label for="inputLastName" class="col-sm-1 col-form-label " style="margin-top:0.3cm;">Medication:</label>
            <div class="col-sm-10">
                <h2 type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 4.7cm;"
                    id="exampleFormControlInput4">{{$medications}}</h2>
            </div>
        </div>
    @endisset

    <div style=" position:absolute;  left:38%; top:22%; ">
        <!-- card that have an image and text box to show the weight -->
        <div class="card" style="width: 17rem;height: 16rem;">
            <div class="rounded mx-auto d-block">
                <!-- Image in the middle of the card -->
{{--                <img src="./Scale.png" class="card-img-top" alt="Scale">--}}
                <img src="{{asset('assets/images/key.png')}}" class="card-img-top" alt="Scale"
                     style="width: 4cm;height: 4cm;margin-top:0.5cm;">
            </div>
            <!-- the text box and the label n the card -->
            <div class="card-body shadow-lg p-3 mb-5 bg-body rounded2">
                <div class="mb-1 row">
                    <label for="inputLastName" class="col-sm-4 col-form-label "
                           style="margin-top:0.3cm;">Weight:</label>
                    <!-- text box -->
                    <div class="col-sm-3">
                        <h2 type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 250%;"
                            id="exampleFormControlInput4">{{$Summary['Weight']}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style=" position:absolute;  left:58%; top:22%; ">
        <!-- card that have an image and text box to show the height -->
        <div class="card" style="width: 17rem;height: 16rem;">
            <div class="rounded mx-auto d-block">
                <!-- Image in the middle of the card -->
{{--                <img src="./Meter.png" class="card-img-top" alt="Scale">--}}
                <img src="{{asset('assets/images/key.png')}}" class="card-img-top" alt="Scale"
                     style="width: 4cm;height: 4cm;margin-top:0.5cm;">
            </div>

            <!-- the two text boxes and the label n the card -->
            <div class="shadow-lg p-3 mb-5 bg-body rounded card-body">
                <div class="mb-1 row">
                    <label for="inputLastName" class="col-sm-4 col-form-label "
                           style="margin-top:0.3cm;">Height:</label>

                    <div class="col-sm-3">
                        <h2 type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 150%;"
                            id="exampleFormControlInput4">{{$Summary['HeightFeet']}}</h2>
                    </div>

                    <div class="col-sm-3">
                        <h2 type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 150%;"
                            id="exampleFormControlInput4">{{$Summary['HeightInches']}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Area to show the Surveys -->
<div style="position:absolute; margin-top: 20%; left:17%; top:20%;">
    @isset($responses)
        <h3>Submitted Surveys</h3>
        <table>
            <tr>
                <th>Survey Name</th>
                <th>Date Completed</th>
                <th>Responses</th>
            </tr>

            @foreach ($names as $p)
                <tr>
                    <td>{{ $names[$loop->index] }}</td>
                    <td>{{ $dates[$loop->index] }}</td>
                    <td>{{$responses[$loop->index]}}</td>
                </tr>
            @endforeach
        </table>
    @endisset
</div>

</body>
</html>
