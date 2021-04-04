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
    @if(Session::has('message'))
        <p class="alert alert-info" style="text-align:center">{{ Session::get('message') }}</p>
    @endif

    <!-- the title in the top middle of the page -->
    <div style=" margin-top: 1cm; margin-left:6%">
        <p class="text-center h2" style="color: seagreen">Modify Survey</p>
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
                <!-- Cooment out due to not MVP
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="{{url('/passwordchangeadmin')}}">
                            <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right">Admin Help</a></p>
                </li>
                -->
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

    <div style="width: 1200px; margin-left:15%; " class="shadow-lg p-3 mb-5 bg-white rounded">

        @foreach ($questions as $q)
            <form name="deleteQuestion" method="post" action="{{url('/deletion-confirmation')}}"
                  enctype="multipart/form-data" style="margin-left: 0px">
                @csrf
                <input type="hidden" id="SurveyName" name="SurveyName" value="{{$name}}">
                <input type="hidden" id="QuestionIndex" name="QuestionIndex" value="{{$loop->iteration}}">
                <div>
                    <button type="submit" style="width: 30px; height: 30px;"><img style="width: 100%; height: 100%;"
                                                                                  src="{{asset('assets/images/redX.png')}}">
                    </button>
                    </button>
                </div>
            </form>

            <p class="h4"> {{str_replace("|",".",$q["Text"])}}</p> <!--Display the question-->

            @if ( $q["Type"]  == "DropDown")
                <select name="{{$q["Text"]}}">

                    <!--iterate over the options-->
                    @foreach(explode(",",$q['PossibleResponses']) as $option)
                        <div class="btn btn-secondary dropdown-toggle" style=" margin-left: 310px">
                            <option value="{{$option}}">{{$option}}</option>
                        </div>
                    @endforeach
                    <br>
                </select>
                <br> <br>

            @elseif ($q["Type"]  == "Checkbox")

                <div style="width:60em;overflow-x: auto;white-space: nowrap;">

                    @foreach(explode(",",$q['PossibleResponses']) as $option)
                        <input class="form-check-input" type="checkbox" name="{{$q["Text"]}}[]" value="{{$option}}">
                        <label class="form-check form-check-inline">{{$option}}</label>

                    @endforeach
                </div>
                <br>
                <br> <br>

            @elseif ($q["Type"]  == "RadioButtons")

                <div style="width:60em;overflow-x: auto;white-space: nowrap;">
                    @foreach(explode(",",$q['PossibleResponses']) as $option)
                        <input type="radio" name="{{$q["Text"]}}" value="{{$option}}" checked>
                        <label>{{$option}}</label>&nbsp;&nbsp;&nbsp;
                    @endforeach
                </div>

                <br>
                <br> <br>

            @elseif ($q["Type"]  == "Text")
                <input type="text" name="{{$q["Text"]}}"><br>
                <br>
                <br> <br>

            @elseif ($q["Type"]  == "FreeText")
                <div class="mb-3">
                    <div class="form-check form-check-inline" style=" margin-left: -10px">
                        <textarea class="form-control" name="{{$q["Text"]}}" rows="3" cols="300"></textarea>
                    </div>
                </div>
                <br> <br>

            @endif
            <p class="double"></p>

        @endforeach
    </div>
    <!-- to add a new question to a survey-->
    <div style="margin:15%; margin-top:3% ;">
        <form name="addQuestion" method="post" action="{{url('/addQuestion')}}" enctype="multipart/form-data" style="margin-left: 0px">
            @csrf
            <input type="hidden" id="SurveyName" name="SurveyName" value="{{$name}}">            

        <br>
        <p style=" margin-left: 50%" class="h4">Add Question:</p>
        <!-- question position in a survey-->       
        <label for="input" style=" width: 220px" class="col-sm-2 col-form-label">New Question Number</label>
        <input type="number" style=" width: 100px" class=" shadow  bg-body rounded" id="qNumber" name="qNumber" min="1" max="{{(count($questions) + 1)}}">

        <!-- question type in a survey-->
        <br><label for="input" style=" width: 200px" class="col-sm-2 col-form-label">Question Type</label>        
        <select style=" width: 200px" class="shadow  bg-body rounded" id="qType" name="qType">
            <option selected>Choose...</option>            
            <option value="FreeText">FreeText</option>
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
                              id="qText" name= "qText"></textarea>                

            </div>
            <!-- how the answer of the question would be-->
            <br><label for="input" style=" width: 500px" class="col-sm-2 col-form-label">Question Responses(If
                required., Seperate with commas No Spaces)</label>
            <div class="form-floating">
                <!-- text area-->
                <textarea style="height: 2cm; " class="shadow-sm form-control"
                              id="qResponses" name="qResponses"></textarea>
            </div>
        </div>
    </div>
    <!-- a submit button-->
    <div style=" height: 4cm;">
        <button style="width: 5cm; margin-left: 50%; margin-top:2cm; " type="submit"
                class="btn btn-success btn-rounded">Submit
        </button>
    </div>
</form>
</div>
    </body>
</div>
</html>
