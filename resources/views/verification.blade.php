<!-- this page is for the patient to verify their email post registration This will verify that contact can be made through provided email. -->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Email Verification</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/cssFile.css')}}">
    <style>
        #wrapper {
            margin-left: auto;
            margin-right: auto;
            width: 1519px;
        }

        body {
            overflow: hidden;
        }

    </style>
</head>

<!-- the body has the content of the page  -->
<body>
<div id="wrapper">

    @if(Session::has('message'))
        <p class="alert alert-info"
           style="text-align:center; width:94.6%; height: 40px; margin-left: 110px">{{ Session::get('message') }}</p>
    @endif

    <section class="container-fluid" style="margin-top: .5cm">
        <!-- the title in the top middle of the page -->
        <div style="margin-left: 3.7cm">
            <p class="text-center h2" style="color:seagreen">Patient Email Verification</p>
            <p class="text-center h4" style="margin-top: 30px">An email has been sent to {{$email}}. Enter Verification
                Code below.</p>
        </div>
        <!-- the Dashboard of the page that has different options-->
        <div class="msb" id="msb">
            <p class="text-center fs-2">PET</p>

            <nav class="navbar navbar-default" role="navigation">
                <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                    <ul class="nav flex-column" style="width:100%">
                        <!-- the Dashboard options-->
                        <!-- Home Option-->
                        <li class="nav-item">
                            <p><a class=" text-dark nav-link active" aria-current="page"
                                  href="{{ url('/')}}"><img src="{{asset('assets/images/Home.png')}}" width="25"
                                                            height="25" class="d-inline-block align-right"> Home</a></p>
                        </li>
                        <!-- Sign Up option-->
                        <li class="nav-item">
                            <p><a class=" text-dark nav-link active" aria-current="page"
                                  href="{{ url('/patientregistration')}}"><img
                                        src="{{asset('assets/images/signup.png')}}" width="25" height="25"
                                        class="d-inline-block align-right"> Sign Up</a></p>
                        </li>
                        <!-- Patient Login option-->
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page"
                                  href="{{ url('/patientlogin')}}"><img src="{{asset('assets/images/key.png')}}"
                                                                        width="25" height="25"
                                                                        class="d-inline-block align-right"> Patient
                                    Login</a></p>
                        </li>
                        <!-- Administrator Login option-->
                        <li class="nav-item">
                            <p><a class="text-dark nav-link active" aria-current="page"
                                  href="{{ url('/adminlogin')}}"><img src="{{asset('assets/images/key.png')}}"
                                                                      width="22" height="25"
                                                                      class="d-inline-block align-right"> Administrator
                                    Login</a></p>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>

        <!-- the form where youhave to put the verification code-->
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container" method="POST" action="{{ url('/patientregistration')}}"
                      style="margin-left: 4cm">
                    @csrf

                    <input type="hidden" id="email" name="email" value="{{$email}}">
                    <input type="hidden" id="password" name="password" value="{{$password}}">
                    <input type="hidden" id="firstName" name="firstName" value="{{$firstName}}">
                    <input type="hidden" id="lastName" name="lastName" value="{{$lastName}}">
                    <input type="hidden" id="dob" name="dob" value="{{$dob}}">
                    <input type="hidden" id="weight" name="weight" value="{{$weight}}">
                    <input type="hidden" id="height" name="height" value="{{$height}}">
                    <input type="hidden" id="gender" name="gender" value="{{$gender}}">
                    <input type="hidden" id="condition" name="condition" value="{{$condition}}">
                    @foreach ($medication as $m)
                        <input type="hidden" name="medication[]" value="{{$m}}" id="medication">
                    @endforeach
                    <input type="hidden" id="verificationCode" name="verificationCode" value="{{$verificationCode}}">
                    <!-- box for Code-->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-group form-inline">Verification Code</label>
                        <input type="text" class="form-control shadow-lg p-3 mb-5 bg-white rounded"
                               id="code" name="code" required>
                    </div>
                    <!-- Submit Button-->
                    <button class="btn btn-success btn-rounded w-100 btn-lg ">Verify</button>
</div>
</form>
</section>
</section>
</section>
</div>
</body>
</html>
