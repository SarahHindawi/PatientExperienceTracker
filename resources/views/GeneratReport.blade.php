<!-- this page that when admin need to generate a report for patients -->

<!DOCTYPE html>
<html>
    <?php echo
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: text/html');?>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Generate Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">
    <style>
        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }
    </style>
</head>
<!-- the body has the content of the page  -->
<div id="wrapper">
    <body style="margin-top: 1cm">
    <!-- the navigation bar in the top-->


    @if(isset($message))
        <p class="alert alert-info" style="text-align:center; margin-top: -1cm; margin-left: 130px">{{ $message}}</p>
    @endif


    <!-- the title in the top middle of the page -->
    <div style=" margin-left:8%">
        <p class="text-center h2 "style="color:seagreen">Generate Report</p>
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

    <form name="surveyForm" method="post" action="/report" enctype="multipart/form-data">
    @csrf
    <!-- the item to collect the report-->
        <div style=" margin-left:38%; margin-top:3%;">
            <div class="panel panel-default">
                <div style="width: 500px;margin-bottom: 1cm;" class="panel-body shadow p-3">

                    <div class="container">
            <br>
            <!-- choose what survey PREMS or PROMS-->
            <p class="h6">Survey Desired:</p>
            <select class="shadow  bg-body rounded" aria-label="Default select example" name="surveyName">
                @foreach ($surveys as $s)
                    <option value="{{$s}}">{{$s}}</option>
                @endforeach
            </select>
            <br> <br>
            <br>
            <!-- choose Gender form-->
            <p class="h6">Gender:</p>
            <div class="form-check form-check-inline">
                <label><input type="radio" name="gender" value="all" checked> Any</label>
            </div>
            <div class="form-check form-check-inline">
                <label><input type="radio" name="gender" value="male"> Male</label>
            </div>
            <div class="form-check form-check-inline">
                <label><input type="radio" name="gender" value="female"> Female</label>
            </div>
            <br>

            <br>
            <!-- choose Age form-->
            <p class="h6">Age:</p>
            <input type="radio" name="age" value="all" checked>All<br>
            <br><input type="radio" name="age" value="above"> Above: <input type="text" class="shadow  bg-body rounded"
                                                                            name="ageAbove" style="width: 50px ">
            <br><br><input type="radio" name="age" value="below"> Below: <input type="text"
                                                                                class="shadow  bg-body rounded"
                                                                                name="ageBelow"
                                                                                style="width: 50px "/><br>
            <br><input type="radio" name="age" value="equals"> Equals: <input type="text"
                                                                              class="shadow  bg-body rounded"
                                                                              name="ageEquals" style="width: 50px"/><br>

            <br>
            <!-- the form to choose Weight-->
            <p class="h6">Weight:</p>
            <input type="radio" name="weight" value="all" checked>All<br>
            <br><input type="radio" name="weight" value="above"> Above: <input type="text"
                                                                               class="shadow  bg-body rounded"
                                                                               name="weightAbove" style="width: 50px ">
            <br><br><input type="radio" name="weight" value="below"> Below: <input type="text"
                                                                                   class="shadow  bg-body rounded"
                                                                                   name="weightBelow"
                                                                                   style="width: 50px "/><br>
            <br><input type="radio" name="weight" value="equals"> Equals: <input type="text"
                                                                                 class="shadow  bg-body rounded"
                                                                                 name="weightEquals"
                                                                                 style="width: 50px"/><br>

            <br>
            <p class="h6">Height:</p>
            <input type="radio" name="height" value="all" checked> All<br>

            <br><input type="radio" name="height" value="above"> Above: <input type="text"
                                                                               class="shadow  bg-body rounded"
                                                                               name="heightAbove"
                                                                               style="width: 50px ">
            <br><br><input type="radio" name="height" value="below"> Below: <input type="text"
                                                                                   class="shadow  bg-body rounded"
                                                                                   name="heightBelow"
                                                                                   style="width: 50px "/><br>
            <br><input type="radio" name="height" value="equals"> Equals: <input type="text"
                                                                                 class="shadow  bg-body rounded"
                                                                                 name="heightEquals"
                                                                                 style="width: 50px"/><br>

            <br>
            <!-- the Medication form-->
            <p class="h6">Medication:</p>
            <input type="radio" name="medicationUsage" value="none" checked> None<br>
            <br><input type="radio" name="medicationUsage" value="includes"> Includes<br>
            <!-- Panel that has the Medications that patients are taken-->
            <div class="panel panel-default">
                <div style="width: 330px;margin-right: 35px;" class="panel-body shadow p-3">

                    <div class="container">
                        <div style="max-width:300px; overflow-x:auto; whitespace:nowrap;">

                            @foreach ($medications as $m)

                                <div class="col">
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

            <div class="text-center">
                        <button style="width: 5cm; margin-bottom:.5cm;margin-top:1cm; " type="submit"
                    class="btn btn-success btn-rounded">Submit
            </button>
            </div>
                        </div>
                    </div>
                </div>
        </div>



    </form>

    </body>
</div>
</html>
