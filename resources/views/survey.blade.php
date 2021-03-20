<!DOCTYPE html>
<html>

<head>
    <title>PREM Survey</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">
</head>

<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Default</a>
        <form class="d-flex">
            <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button"
                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                John Doe
            </button>
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

<div style=" margin-top:2%; margin-left:10%">
    <h3 style="color:seagreen; text-align:center;">Patient Experience Tracker</h3>
    <p class="text-center h2">PREM SURVEY</p>
    <p style="text-align:center; color:red" ;>Please Fill the form corretcly and press Submit</p>
</div>


<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>

    <nav class="navbar navbar-default" role="navigation">
        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
            <ul class="nav flex-column" style="width:100%">
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="#">
                            <img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right"> Dashboard
                        </a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right">Complete a
                            Survey
                        </a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="#">
                            <img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right">Change Password
                        </a></p>
                </li>
            </ul>
        </div>

    </nav>
</div>

<form name="surveyForm" method="post" action="/form" enctype="multipart/form-data">
    <br style="line-height:100;">

    @csrf
    <div style="width: 1100px; margin-left:27%; " class="shadow-lg p-3 mb-5 bg-white rounded">

        @foreach ($questions as $q)
            <p class="h4"> {{$q["Text"]}}</p> <!--Display the question-->

            @if ( $q["Type"]  == "DropDown")
                <select name="{{$q["Text"]}}">

                    <!--iterate over the options-->
                    @foreach(explode(",",$q['PossibleResponses']) as $option)
                        <div  class="btn btn-secondary dropdown-toggle" style=" margin-left: 310px">
                            <option value="{{$option}}">{{$option}}</option>
                        </div>
                    @endforeach
                    <br>
                </select>
                <br> <br>

            @elseif ($q["Type"]  == "Checkbox")

                @foreach(explode(",",$q['PossibleResponses']) as $option)
                    <input class="form-check-input" type="checkbox" name="{{$q["Text"]}}[]" value="{{$option}}">
                        <label class="form-check form-check-inline">{{$option}}</label>
                @endforeach
                <br>
                <br> <br>

            @elseif ($q["Type"]  == "Radio")

                @foreach(explode(",",$q['PossibleResponses']) as $option)
                    <input type="radio" name="{{$q["Text"]}}" value="{{$option}}">
                        <label>{{$option}}</label>
                @endforeach
                <br>
                <br> <br>

            @elseif ($q["Type"]  == "Text")
                    <input type="text" name="{{$q["Text"]}}"><br>
                <br>
                <br> <br>

            @elseif ($q["Type"]  == "TextArea")
                <div class="mb-3">
                    <div class="form-check form-check-inline" style=" margin-left: 310px">
                        <textarea class="form-control" name="{{$q["Text"]}}" rows="3"></textarea>
                    </div>
                </div>
                <br> <br>

            @endif
            <p class="double"></p>

        @endforeach

        <div style=" height: 4cm;">
            <button style="width: 5cm; margin-left: 40%; margin-top:2cm; " type="button"
                    class="btn btn-success btn-rounded">Submit
            </button>
        </div>
    </div>
</form>

</body>

</html>
