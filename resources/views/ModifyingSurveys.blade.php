<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Modify Survey</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet"
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

    <body>
    <!-- the navigation bar in the top-->
    @isset($message)
        <p class="alert alert-info" style="text-align:center; margin-bottom: -20px; margin-left: 65px">{{ $message }}</p>
    @endisset

    <!-- the title in the top middle of the page -->
    <div style=" margin-top: 1cm; margin-left:6%">
        <p class="text-center h2" style="color: seagreen">Modify Survey</p>
        <p class="text-center h4" style="margin-top: 35px">{{$name}}</p>
    </div>

    <!-- the Dashboard of the page that has different options-->

    <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <!-- the Dashboard options-->
                    <li class="nav-item">
                        <!-- the Dashboard options-->
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{url('/')}}">
                                <img src="{{asset('assets/images/Home.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Dashboard</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/accept/create')}}">
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
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/profilesearch')}}">
                                <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Patient Summary</a></p>
                    </li>
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page" href="{{ url('/report/create')}}">
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
                                                                        class="d-inline-block align-right"> Create New
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
                              href="{{ url('/logout')}}"><img src="{{asset('assets/images/key.png')}}" width="25"
                                                              height="25" class="d-inline-block align-right"> Logout</a>
                        </p>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- an example on how to add or remove survey questions-->
    <br style="line-height:100;">

    <div style="width: 1270px; margin-left:15%; " class="shadow-lg p-3 mb-5 bg-white rounded">

        @foreach ($questions as $q)
            <form name="deleteQuestion" method="post" action="{{url('/deletion-confirmation')}}"
                  enctype="multipart/form-data" style="margin-left: 0px">
                @csrf
                <input type="hidden" id="SurveyName" name="SurveyName" value="{{$name}}">
                <input type="hidden" id="QuestionIndex" name="QuestionIndex" value="{{$loop->iteration}}">
                <div>
{{--                    <button type="submit" style="width: 25px; height: 24px;"><img--}}
{{--                            style="margin-left: -7px; margin-top: -11px" width="22" height="22"--}}
{{--                            src="{{asset('assets/images/redX.png')}}">--}}
{{--                    </button>--}}

                    <input type="image" name="imgbtn" style="width: 25px; height: 24px;"
                           src="{{asset('assets/images/x.png')}}">

                </div>
            </form>

            <p class="h6" style="font-size: 18px"> {{$loop->index+1}}) {{str_replace("|",".",$q["Text"])}}</p>
            <!--Display the question-->

            @if ( $q["Type"]  == "DropDown")
                <select name="{{$q["Text"]}}">

                    <!--iterate over the options-->
                    @foreach(explode(",",$q['PossibleResponses']) as $option)
                        <div class="btn btn-secondary dropdown-toggle" style=" margin-left: 310px">
                            <option value="{{$option}}">{{$option}}</option>
                        </div>
                    @endforeach
                </select>
                <br> <br>

            @elseif ($q["Type"]  == "Checkbox")

                <div style="width:77em;word-wrap: break-word">

                @foreach(explode(",",$q['PossibleResponses']) as $option)
                        <label class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="{{$q["Text"]}}[]" value="{{$option}}"> {{$option}}</label>

                    @endforeach
                </div>
                <br>

            @elseif ($q["Type"]  == "RadioButtons")

                <div style="width:77em;word-wrap: break-word">

                    @foreach(explode(",",$q['PossibleResponses']) as $option)
                        <label><input type="radio" name="{{$q["Text"]}}" value="{{$option}}" checked> {{$option}}</label>&nbsp;&nbsp;&nbsp;
                    @endforeach
                </div>
                <br>

            @elseif ($q["Type"]  == "Text")
                <input type="text" name="{{$q["Text"]}}"> <br>

            @elseif ($q["Type"]  == "FreeText")
                <div class="mb-3">
                    <div class="form-check form-check-inline" style=" margin-left: -10px">
                        <textarea class="form-control" name="{{$q["Text"]}}" rows="3" cols="300"></textarea>
                    </div>
                </div>
                <br>

            @endif
            <p class="double"></p>

        @endforeach
    </div>
    <div style="margin:15%; margin-top:3% ;">
        <form name="addQuestion" method="post" action="{{url('/addQuestion')}}" enctype="multipart/form-data"
              style="margin-left: 0px">
            @csrf
            <input type="hidden" id="SurveyName" name="SurveyName" value="{{$name}}">
            <br>
            <p style=" margin-left: 45%" class="h4">Add Question:</p>
            <!-- question position in a survey-->
            <label for="input" style=" width: 220px" class="col-sm-2 col-form-label">New Question Number:</label>
            <input type="number" style=" width: 100px; margin-left: -20px" class=" shadow  bg-body rounded" id="qNumber"
                   name="qNumber"
                   min="1" max="{{(count($questions) + 1)}}" required>

            <!-- question type in a survey-->
            <br><label for="input" style=" width: 200px" class="col-sm-2 col-form-label">Question Type:</label>
            <select style=" width: 200px" class="shadow  bg-body rounded" id="qType" name="qType">
                <option value="FreeText" selected>FreeText</option>
                <option value="DropDown">DropDown</option>
                <option value="Checkbox">Checkbox</option>
                <option value="RadioButtons">RadioButtons</option>
            </select>
            <div style="width: 400px; margin-left:70%; margin-top:-8%; height: 20px;">
                <!--  text of the question that needs to be added in a survey-->
                <label for="input" style=" width: 200px" class="col-sm-2 col-form-label">Question text:</label>
                <div class="form-floating">
                    <!-- text area-->
                    <textarea style="height: 2cm; " class="shadow-sm form-control" placeholder=""
                              id="qText" name="qText" required></textarea>
                </div>
                <!-- how the answer of the question would be-->
                <br><label for="input" style=" width: 500px" class="col-sm-2 col-form-label">Question Responses (If
                    required. Separate with commas, No Spaces)</label>
                <div class="form-floating">
                    <!-- text area-->
                    <textarea style="height: 2cm; " class="shadow-sm form-control"
                              id="qResponses" name="qResponses"></textarea>
                </div>
            </div>
    </div>
    <!-- a submit button-->
    <div style=" height: 4cm;">
        <button style="width: 5cm; margin-left: 46%; margin-top:2cm; " type="submit"
                class="btn btn-success btn-rounded">Save
        </button>
    </div>
    </form>
</div>

</div>
</body>
</html>
