<!DOCTYPE html>
<html>
    <head>
        <title>Patient Report Search</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="resources/css/cssFile.css">
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Default</a>
              <form class="d-flex">
                <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
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

        <div style=" margin-top:5%; margin-left:10%">
            <p class="text-center h2">Patient Profile Search</p>
        </div>



        <div class="msb" id="msb">
            <p class="text-center fs-2">PSS</p>

            <nav class="navbar navbar-default" role="navigation">
                <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
                    <ul class="nav flex-column" style="width:100%">
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Dashboard</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Patient Registeration</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Password Reset</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Patient Summary</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Generate Report</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Modify Survey</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Change Password</a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Admin Help</a></p>
                        </li>
                      </ul>
                    </div>
                </nav>
            </div>

        <form style="width: 600px; margin:15%; margin-top:8%">
        <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control shadow-sm" id="inputEmail">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputFirstName" class="col-sm-2 col-form-label">First Name </label>
            <div class="col-sm-10">
              <input type="password" class="form-control shadow-sm" id="inputFirstName">
              <div style="margin-left:130%; margin-top:-7%; width: 150Px">
              <button style="width: 200px;" type="button" class="btn btn-success btn-rounded">Search</button>
            </div>
            </div>
          </div>
            <div class="mb-3 row">
            <label for="inputLastName" class="col-sm-2 col-form-label ">Last Name</label>
            <div class="col-sm-10">
                <input type="password" class="form-control shadow-sm" id="inputLastName">
            </div>
        </form>

    </body>
</html>
