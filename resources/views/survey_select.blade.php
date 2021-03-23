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

     <!-- The dashborad which has all the options for the Patient. This dashboard is located in the side of the page-->
     <div class="msb" id="msb">
        <p class="text-center fs-2">PET</p>

        <nav class="navbar navbar-default" role="navigation">
            <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                <ul class="nav flex-column" style="width:100%">
                   <!-- the Dashboard options-->
                    <!-- Dashboard Option-->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-center text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/')}}"><img src="{{asset('assets/images/Home.png')}}" width="25" height="25" class="d-inline-block align-right"> Dashboard</a></p>
                     <!--Survey Option-->
                    </li>
                    <li class="nav-item">
                        <p class="text-center"><a class="text-center text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/surveyselection')}}"><img src="{{asset('assets/images/survey.png')}}" width="25" height="25" class="d-inline-block align-right"> Complete Survey</a></p>
                    </li>
                    <!-- Password Change Option-->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href="{{ url('/passwordchangepatient')}}"><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Change Password</a></p>
                    </li>
                    <!--Logout Option-->
                    <li class="nav-item">
                        <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                                  href= "{{ url('/logout')}}" ><img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right"> Logout</a></p>
                    </li>
                </ul>
            </div>

        </nav>
    </div>

    <section class="container-fluid">
    <div>
        <p class="text-center h1" style="color:seagreen">Survey Selection</p>
        <p class="text-center h3">Please enter a Survey Selection Below</p>
    </div>


    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
            <form class="form-container" method = "POST" action = "{{ url('/form/create')}}">
                @csrf
                <!-- Box for Survey Selection-->
                <div class="mb-3" style="margin-left:3cm">
                    <label for="exampleInputEmail1" class="form-group form-inline">SurveyName</label>
                    {!! Form::select('surveyName',  $surveys, null,['class' => 'form-control', 'placeholder' => 'Select Survey Name']) !!}
                </div>
                <br><br>
                <!-- Submission button-->
                    <button class="btn btn-success btn-rounded w-100 btn-lg" style="margin-left:3cm">Select</button>

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
