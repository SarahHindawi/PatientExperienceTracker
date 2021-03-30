<!DOCTYPE html>
<html>

<head>
    <title>Survey Selection</title>
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/cssFile.css')}}">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body>
@if(Session::has('message'))
    <p class="alert alert-info"style="text-align:center; height: 40px">{{ Session::get('message') }}</p>
@endif

<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>

    <nav class="navbar navbar-default" role="navigation">
        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
            <ul class="nav flex-column" style="width:100%">
                <li class="nav-item">
                    <!-- the Dashboard options-->
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="{{ url('/')}}">
                            <img src="{{asset('assets/images/Home.png')}}" width="25" height="25"
                                 class="d-inline-block align-right"> Dashboard</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="{{ url('/accept/create')}}">
                            <img src="{{asset('assets/images/request.png')}}" width="25" height="25"
                                 class="d-inline-block align-right"> Patient Registration</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="{{ url('/passwordreset/create')}}">
                            <img src="{{asset('assets/images/request.png')}}" width="25" height="25"
                                 class="d-inline-block align-right"> Password Reset</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="{{ url('/profilesearch')}}">
                            <img src="{{asset('assets/images/pen.png')}}" width="25" height="25"
                                 class="d-inline-block align-right"> Patient Summary</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
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
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="{{url('/passwordchangeadmin')}}">
                            <img src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                 class="d-inline-block align-right"> Change Password</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                            <img src="{{asset('assets/images/questionmark.png')}}" width="25" height="25"
                                 class="d-inline-block align-right">Admin Help</a></p>
                </li>
                <!--Logout Option-->
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="{{ url('/logout')}}"><img
                                src="{{asset('assets/images/key.png')}}" width="25" height="25"
                                class="d-inline-block align-right"> Logout</a></p>
                </li>
            </ul>
        </div>
    </nav>
</div>

<section class="container-fluid">
    <div>
        <p class="text-center h1" style="color:seagreen; margin-top: 20px;">Survey Selection</p>
        <p class="text-center h3">Please enter a Survey Selection Below</p>
    </div>


    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
            <form class="form-container" method = "POST" action = "{{ url('/editSurvey/create')}}">
            @csrf
            <!-- Box for Survey Selection-->
                <div class="mb-3" style="margin-left:3cm; margin-top: 10px">
                    <label for="exampleInputEmail1" class="form-group form-inline">Survey Name:</label>
                    <div style="margin-left: -21%; margin-top: 10px">
                        {!! Form::select('SurveyName',  $surveys, null,['class' => 'form-control', 'placeholder' => 'Select Survey Name']) !!}
                    </div>
                </div>
                <br><br>
                <!-- Submission button-->
                <button class="btn btn-success btn-rounded w-100 btn-lg" style="margin-left: 10%">Select</button>

                </div>
            </form>

        </section>
    </section>
</section>
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

</html>
