<!DOCTYPE html>
<html>

<head>
    <title>Survey Selection</title>
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/cssFile.css')}}">

    <!--
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    -->
    <style>
    #wrapper {
        margin-left: auto;
        margin-right: auto;
        width: 1419px;
    }


    </style>
</head>
<div id="wrapper">
<body>
    @if(Session::has('message'))
    <p class="alert alert-info"style="text-align:center; height: 40px">{{ Session::get('message') }}</p>
    @endif

     <!-- The dashboard which has all the options for the Patient. This dashboard is located in the side of the page-->
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

<div style="margin-left: -2cm; margin-top: -.2cm">
    <div>
        <p class="text-center h2" style="color:seagreen; margin-top: 20px;margin-top: 1cm; margin-left: 4cm">Survey Selection</p>
        <p class="text-center h4"style="text-align:center; margin-top:1cm; margin-left: 4cm">Please enter a Survey Selection Below</p>
    </div>

    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
            <form method = "POST" action = "{{ url('/form/create')}}" style="margin-left: -30px">
                @csrf
                <!-- Box for Survey Selection-->
                <div class="mb-3" style="margin-left: 37%; margin-top: 2cm">
                    <label for="exampleInputEmail1">Survey Name:</label>
                    {!! Form::select('surveyName',  $surveys, null,['class' => 'form-control shadow p-2  bg-body rounded', 'placeholder' => 'Select Survey Name' , 'style' => 'width: 300px;']) !!}
                </div>
                <br><br>
                <!-- Submission button-->
                    <button class="btn btn-success btn-rounded" style="margin-left: 50%; width: 5cm">Select</button>
            </form>

        </section>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
</body>
</div>
</html>
