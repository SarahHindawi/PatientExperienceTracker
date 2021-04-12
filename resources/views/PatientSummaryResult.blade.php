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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/buttons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-reset_password.css')}}">

    <style>
        table, th, td {
            border: 1px solid black;
            padding: 15px;
            text-align: center;
        }

        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }

        th, td {
            width: 230px;
        }


    </style>

</head>
<div id="wrapper">

    <!-- the body has the content of the page  -->
    <body>

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


    <!-- the title in the top  -->
    <div style=" margin-top:2%; margin-left:16%">
        <p class="h3">Here is the patient summary for {{$Summary['FirstName']}} {{$Summary['LastName']}}</p>
    </div>
    <div style=" margin-left:17%; margin-top:3%;">
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

        <h2 class="form-control shadow-lg" style="margin-top:0.3cm;width: 7cm;"
            id="exampleFormControlInput4"><strong>Condition: </strong>{{$Summary['Condition']}}</h2>

        @isset($medications)
            <h2 class="form-control shadow-lg" style="margin-top:0.3cm;width: 7cm;"
                id="exampleFormControlInput4"><strong>Medication: </strong>{{$medications}}</h2>
        @endisset


        <div style="margin-left:25%;margin-top: -300px">
            <!-- card that have an image and text box to show the weight -->
            <div class="card" style="width: 17rem;height: 16rem;">
                <div class="rounded mx-auto d-block">
                    <!-- Image in the middle of the card -->
                    <img src="{{asset('assets/images/Scale.png')}}" class="card-img-top" alt="Scale"
                         style="width: 4cm;height: 4cm;margin-top:0.5cm;">
                </div>
                <!-- the text box and the label n the card -->
                <div class="card-body shadow-lg p-3 mb-5 bg-body rounded2">
                    <div class="mb-1 row">
                        <label for="inputLastName" class="col-sm-5 col-form-label "
                               style="margin-top:0.3cm;">Weight (lb):</label>
                        <!-- text box -->
                        <div class="col-sm-3">
                            <h2 type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 150%;"
                                id="exampleFormControlInput4">{{$Summary['Weight']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-left: 55%; margin-top:-255px;">
            <!-- card that have an image and text box to show the height -->
            <div class="card" style="width: 17rem;height: 16rem;">
                <div class="rounded mx-auto d-block">
                    <!-- Image in the middle of the card -->
                    <img src="{{asset('assets/images/Meter.png')}}" class="card-img-top" alt="Scale"
                         style="width: 4cm;height: 4cm;margin-top:0.5cm;">
                </div>

                <!-- the two text boxes and the label n the card -->
                <div class="shadow-lg p-3 mb-5 bg-body rounded card-body">
                    <div class="mb-1 row">
                        <label for="inputLastName" class="col-sm-6 col-form-label "
                               style="margin-top:0.3cm;">Height (cm):</label>

                        <div class="col-sm-3">
                            <h2 type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 150%;"
                                id="exampleFormControlInput4">{{$Summary['Height']}} </h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Area to show the Surveys -->
    <div style="margin-left:15%; margin-top:90px; margin-bottom: 20px">
        @isset($responses)
            <h3 style="  text-align: center; margin-left: -40%; margin-bottom: 10px">Submitted Surveys</h3>
            <table>
                <colgroup>
                <tr>
                    <th>Survey Name</th>
                    <th>Date Completed</th>
                    <th style="width:30%">Responses</th>
                </tr>

                @foreach ($names as $p)
                    <tr>
                        <td>{{ $names[$loop->index] }}</td>
                        <td>{{ $dates[$loop->index] }}</td>

                        <td ><form method="post" action="/preview" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="patient" value="{{$Summary['FirstName']}} {{$Summary['LastName']}}">
                                <input type="hidden" name="responses" value="{{ json_encode($responses[$loop->index],TRUE)}}">
                                <input type="hidden" name="name" value="{{ $names[$loop->index] }}">
                                <input type="hidden" name="date" value="{{ $dates[$loop->index] }}">
                                <input type="hidden" name="email" value="{{ $Summary['email'] }}">

                                <button class="block button button1" type="submit" style="padding: 5px 10px"><span>View Survey</span></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </table>
        @endisset
    </div>

    </body>
</div>

</html>
