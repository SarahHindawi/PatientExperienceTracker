<!DOCTYPE html>
<html>

<head>
    <title>PREM Survey</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">
</head>
<style>

    #wrapper {
        margin-left: auto;
        margin-right: auto;
        width: 1519px;
    }

</style>
<div id="wrapper">
    <body>


    <div style=" margin-top:1cm; margin-left:10%">
{{--        <h3 style="font-size:32pt; color:seagreen; text-align:center;">Patient Experience Tracker</h3>--}}
        <p class="text-center h2">{{$name}} Survey</p>
        <p style="text-align:center; color:red">Please fill out the form correctly and press Submit</p>
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
                <!-- Comment Out due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Modify Survey</a></p>
                    </li>
                    -->
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                              href="{{url('/passwordchangeadmin')}}">
                                <img src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                     class="d-inline-block align-right"> Change Password</a></p>
                    </li>
                <!-- Comment Out Due to not MVP
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25" class="d-inline-block align-right">Admin Help</a></p>
                    </li>
                    -->

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

    <form name="surveyForm" method="post" action="/adminform" enctype="multipart/form-data" style="margin-left: 0px">
        <br style="line-height:100;">

        @csrf
        <input type="hidden" id="surveyname" name="surveyname" value="{{$name}}">

        <div style="width: 1270px; margin-left:15%; " class="shadow-lg p-3 mb-5 bg-white rounded">
            <label class="h6" for="email" style="font-size: 18px">Patient's Email: </label> <input type="email" id="email"
                                                                                  name="email" size="35" style="margin-left: 10px" required>

            <br><br>

            <p class="double"></p>

            @foreach ($questions as $q)
                <p class="h4" style="font-size: 18px"> {{str_replace("|",".",$q["Text"])}}</p> <!--Display the question-->

                @if ( $q["Type"]  == "DropDown")
                    <select name="{{$q["Text"]}}">

                        <!--iterate over the options-->
                        @foreach(explode(",",$q['PossibleResponses']) as $option)
                            <div  class="btn btn-secondary dropdown-toggle" style=" margin-left: 310px">
                                <option value="{{$option}}">{{$option}}</option>
                            </div>
                        @endforeach
                    </select>
                    <br> <br>

                @elseif ($q["Type"]  == "Checkbox")

                    <div style="width:77em;word-wrap: break-word">
                        {{--                <input class="form-check-input" type="checkbox" name="{{$q["Text"]}}[]" value="Prefer not to answer" checked>--}}
                        {{--                <label class="form-check form-check-inline">Prefer not to answer</label>--}}

                        @foreach(explode(",",$q['PossibleResponses']) as $option)
                            <label class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="{{$q["Text"]}}[]" value="{{$option}}"> {{$option}}</label>

                        @endforeach
                    </div>
                    <br>

                @elseif ($q["Type"]  == "RadioButtons")

                    <div style="width:77em;word-wrap: break-word">
                        {{--                <input type="radio" name="{{$q["Text"]}}" value="Prefer not to answer" checked>--}}
                        {{--                        <label>Prefer not to answer</label>&nbsp;&nbsp;&nbsp;--}}
                        @foreach(explode(",",$q['PossibleResponses']) as $option)
                            <label><input type="radio" name="{{$q["Text"]}}" value="{{$option}}"> {{$option}}</label>&nbsp;&nbsp;&nbsp;
                        @endforeach
                    </div>
                    <br>

                @elseif ($q["Type"]  == "Text")
                    <input type="text" name="{{$q["Text"]}}">
                    <br>

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

            <div style=" height: 4cm; margin-left: 1.5cm">
                <button style="width: 5cm; margin-left: 40%; margin-top:2cm; " type="submit"
                        class="btn btn-success btn-rounded">Submit
                </button>
            </div>
        </div>
    </form>

    </body>
</div>

</html>
