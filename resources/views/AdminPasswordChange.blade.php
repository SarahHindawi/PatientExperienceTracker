<!DOCTYPE html>
<html>

<head>
    <title>Admin Password Change</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./cssFile.css">

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

<div style=" margin-top:4%; margin-left:10cm">
    <p class="text-center h4">Here you can change the password on your account.</p>
    <p class="text-center h4">See passowrd rules below</p>
</div>



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

<form>
    <div style="width: 550px; margin-left:6cm; margin-top:6%">
        <div class="mb-7 row">
            <label for="inputFirstName" class="col-sm-4 col-form-label">Current Password: </label>
            <div class="col-sm-5">
                <input type="password" style="width:7cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                       id="inputFirstName">
            </div>
        </div>
        <div class="mb-7 row">
            <label for="inputFirstName" class="col-sm-4 col-form-label">New Password: </label>
            <div class="col-sm-5">
                <input type="password" style="width:7cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                       id="inputFirstName">
            </div>
        </div>
        <div class="mb-7 row">
            <label for="inputFirstName" class="col-sm-4 col-form-label">Confirm New Address: </label>
            <div class="col-sm-5">
                <input type="password" style="width:7cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                       id="inputFirstName">
            </div>
        </div>
    </div>
    <div class="card panel-body shadow p-3"
         style="width: 25rem;height: 15rem;;margin-left: 29cm; margin-top: -6cm;">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Password needs to be between 8 and 20 charachters</h6>
            <br><br>
            <h6 class="card-subtitle mb-2 text-muted">Password Must Contain:</h6>
            <h6 class="card-subtitle mb-2 text-muted">-Rule 1</h6>
            <h6 class="card-subtitle mb-2 text-muted">-Rule 2</h6>
            <h6 class="card-subtitle mb-2 text-muted">-Rule 3</h6>
        </div>
    </div>
    <br><br>
    <div style="margin-left:20cm;">
        <button style="width: 200px;" type="button" class="btn btn-success btn-rounded">Submit</button>
    </div>
</form>



</body>

</html>
