<!-- this page is for the admin request a temporary password be sent to their email. -->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Admin Password Reset Page</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/cssFile.css')}}">
    <style>
        #wrapper {
            margin-left:auto;
            margin-right:auto;
            width:1519px;
        }
    </style>
</head>

<!-- the body has the content of the page  -->
<div id="wrapper">
<body>
    @if(Session::has('message'))
    <p class="alert alert-info" style="text-align:center">{{ Session::get('message') }}</p>
    @endif

<section class="container-fluid">
    <!-- the title in the top middle of the page -->
    <div>
        <p class="text-center h1" style="color:seagreen; margin-top: 2%; margin-left: 4cm">Reset Administrator Password</p>
        <p class="text-center h3"style="margin-top: 3%; margin-left: 4cm">Enter your Administrator email below</p>
    </div>
    <!-- the Dashboard of the page that has different options-->
    <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="naviga
        tion">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                    <!-- the Dashboard options-->
                    <!-- Home Option-->
                    <li class="nav-item">
                        <p><a class=" text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/')}}"><img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right"> Home</a></p>
                    </li>
                    <!-- Sign Up option-->
                    <li class="nav-item">
                        <p><a class=" text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/patientregistration')}}"><img src="{{asset('assets/images/signup.png')}}" width="25" height="25" class="d-inline-block align-right"> Sign Up</a></p>
                    </li>
                    <!-- Patient Login option-->
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/patientlogin')}}"><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Patient Login</a></p>
                    </li>
                    <!-- Administrator Login option-->
                    <li class="nav-item">
                        <p><a class="text-dark nav-link active" aria-current="page"
                                                  href= "{{ url('/adminlogin')}}" ><img src="{{asset('assets/images/key.png')}}" width="22" height="25" class="d-inline-block align-right"> Administrator Login</a></p>
                    </li>
                </ul>
            </div>

        </nav>
    </div>

    <!-- the form where you have to put admin email the password-->
    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
            <form method = "POST" action = "{{ url('/adminresetmail')}}">
                @csrf
                <!-- box for email-->
                <div class="mb-3" style="margin-left:37%; margin-top: 2cm">
                    <label for="exampleInputEmail1" class="form-group form-inline">Email Address:</label>
                    <input type="email" style="width: 7cm" class="form-control shadow-lg p-2 mb-4 bg-white rounded"
                           id="email" aria-describedby="emailHelp" name = "email" required>
                </div>
                <!-- Submit Button-->
                    <button class="btn btn-success btn-rounded" style="margin-left:45%; width:6cm">Submit</button>

                </div>
            </form>

        </section>
    </section>
</section>
</body>
</div>
</html>
