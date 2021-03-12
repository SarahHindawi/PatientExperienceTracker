<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Summary Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Default</a>
        <form class="d-flex">
            <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button"
                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><button class="dropdown-item" type="button">Action</button></li>
                <li><button class="dropdown-item" type="button">Another action</button></li>
                <li><button class="dropdown-item" type="button">Something else here</button></li>
            </ul>
        </form>
    </div>
</nav>




<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>

    <nav class="navbar navbar-default" role="navigation">
        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
            <ul class="nav flex-column" style="width:100%">
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="#">Dashboard</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Patient
                            Registeration</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="#">Password Reset</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Patient
                            Summary</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="#">Generate Report</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Modify
                            Survey</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Change
                            Password</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Admin
                            Help</a></p>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div style=" margin-top:2%; margin-left:16%">
    <p class="h3">Here is the patient Summary for </p>
</div>
<div style=" margin:17%; margin-top:3%;">
    <input type="text" class="form-control shadow-lg" style="margin-top:0.3cm;width: 7cm;"
           id="exampleFormControlInput1">
    <input type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 7cm;"
           id="exampleFormControlInput2">
    <input type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 7cm;"
           id="exampleFormControlInput3">
    <div class="mb-1 row">
        <label for="inputLastName" class="col-sm-1 col-form-label " style="margin-top:0.3cm;">Condition:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 4.7cm;"
                   id="exampleFormControlInput4">
        </div>
    </div>
    <div class="mb-1 row">
        <label for="inputLastName" class="col-sm-1 col-form-label " style="margin-top:0.3cm;">Medication:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 4.7cm;"
                   id="exampleFormControlInput5">
        </div>
    </div>
    <div style=" position:absolute;  left:38%; top:22%; ">
        <div class="card" style="width: 17rem;height: 16rem;">
            <div class="rounded mx-auto d-block">
                <img src="./Scale.png" class="card-img-top" alt="Scale"
                     style="width: 4cm;height: 4cm;margin-top:0.5cm;">
            </div>
            <div class="card-body shadow-lg p-3 mb-5 bg-body rounded2">
                <div class="mb-1 row">
                    <label for="inputLastName" class="col-sm-4 col-form-label "
                           style="margin-top:0.3cm;">Weight:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 4cm;"
                               id="exampleFormControlInput5">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style=" position:absolute;  left:58%; top:22%; ">
        <div class="card" style="width: 17rem;height: 16rem;">
            <div class="rounded mx-auto d-block">
                <img src="./Meter.png" class="card-img-top" alt="Scale"
                     style="width: 4cm;height: 4cm;margin-top:0.5cm;">
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded card-body">
                <div class="mb-1 row">
                    <label for="inputLastName" class="col-sm-4 col-form-label "
                           style="margin-top:0.3cm;">Height:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 1.5cm;"
                               id="exampleFormControlInput6" placeholder="ft">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control shadow-lg" style="margin-top:0.3cm; width: 1.5cm;"
                               id="exampleFormControlInput7" placeholder="'">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="position:absolute;  left:17%; top:12cm;">
    <label for="inputLastName" class="col-sm-1 col-form-label ">PREM Survey:</label>
    <div class="modal-dialog modal-lg">...</div>
</div>
<div style="position:absolute;  left:17%; top:17cm;">
    <label for="inputLastName" class="col-sm-1 col-form-label ">PROM Survey:</label>
    <div class="modal-dialog modal-lg">...</div>
</div>

</body>

</html>
