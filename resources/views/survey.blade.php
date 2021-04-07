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
    <p class="text-center h2">{{$name}} Survey</p>
    <p style="text-align:center; color:red">Please fill out the form correctly and press Submit</p>
</div>


<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>

    <nav class="navbar navbar-default" role="navigation">
        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
            <ul class="nav flex-column" style="width:100%">
                <!-- the Dashboard options-->
                <!-- Dashboard Option-->
                <li class="nav-item">
                    <p><a class=" text-dark nav-link active" aria-current="page"
                                              href="{{ url('/')}}"><img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right"> Dashboard</a></p>
                    <!--Survey Option-->
                </li>
                <li class="nav-item">
                    <p><a class=" text-dark nav-link active" aria-current="page"
                                              href="{{ url('/surveyselection')}}"><img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right"> Complete Survey</a></p>
                </li>
                <!-- Password Change Option-->
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page"
                                              href="{{ url('/passwordchangepatient')}}"><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Change Password</a></p>
                </li>
                <!--Logout Option-->
                <li class="nav-item">
                    <p><a class="text-dark nav-link active" aria-current="page"
                                              href= "{{ url('/logout')}}" ><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Logout</a></p>
                </li>
            </ul>
        </div>

    </nav>
</div>

<form name="surveyForm" method="post" action="/form" enctype="multipart/form-data" style="margin-left: 0px">
    <br style="line-height:100;">

    @csrf
    <input type="hidden" id="surveyname" name="surveyname" value="{{$name}}">
    <div style="width: 1270px; margin-left:15%; " class="shadow-lg p-3 mb-5 bg-white rounded">

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

        <div style=" height: 4cm;">
            <button style="width: 5cm; margin-left: 40%; margin-top:2cm; " type="submit"
                    class="btn btn-success btn-rounded">Submit
            </button>
        </div>
    </div>
</form>

</body>
</div>

</html>
