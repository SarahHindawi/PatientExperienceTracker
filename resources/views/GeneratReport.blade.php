<!DOCTYPE html>
<html>
    <head>
        <title>Generate Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./cssFile.css">
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
            <p class="text-center h2">Generate Report</p>
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



            <div style="width: 300px; margin:15%; margin-top:3%">
                <form>
                    <p class="h6">Survey Desired: (Required):</p>
                  <div class="form-check form-check-inline">
                    <label><input type="radio" name="optradio" checked>PREMS</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label><input type="radio" name="optradio">PROMS</label>
                  </div><br>

                  <br><p class="h6">Condition (Required):</p>
                  <select class="form-select shadow-sm" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select><br>


                  <br><p class="h6">Gender:</p>
                  <div class="form-check form-check-inline">
                    <label><input type="radio" name="optradio" checked>Both</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label><input type="radio" name="optradio">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label><input type="radio" name="optradio">Female</label>
                  </div><br>

                  <br><p class="h6">Age:</p>
                  <input type="radio" name="reason" value="Suspicious Behavior">All<br>
              <br><input type="radio" name="reason" value="">Above: <input type="text" class="shadow-sm" name="other_reason"style="width: 50px " > Below:  <input type="text" class="shadow-sm" name="other_reason"style="width: 50px "  /><br>
              <br><input type="radio" name="reason" value="">Equals: <input type="text" class="shadow-sm" name="other_reason"style="width: 50px"  /><br>

              <br><p class="h6">Weight:</p>
              <input type="radio" name="reason" value="Suspicious Behavior">All<br>
              <br><input type="radio" name="reason" value="">Above: <input type="text" class="shadow-sm" name="other_reason"style="width: 50px " > Below:  <input type="text" class="shadow-sm" name="other_reason"style="width: 50px "  /><br>
              <br><input type="radio" name="reason" value="">Equals: <input type="text" class="shadow-sm" name="other_reason"style="width: 50px"  /><br>

                </form>
              </div>

              <div style="width: 300px; margin:70%; margin-top:-57%">
                <form>
              <br><p class="h6">Height:</p>
              <input type="radio" name="reason" value="Suspicious Behavior">All<br>
              <br><input type="radio" name="reason" value="">Above: <input type="text" class="shadow-sm" name="other_reason"style="width: 50px " > Below:  <input type="text" class="shadow-sm" name="other_reason"style="width: 50px "  /><br>
              <br><input type="radio" name="reason" value="">Equals: <input type="text" class="shadow-sm" name="other_reason"style="width: 50px"  /><br>

              <br><p class="h6">Medication:</p>
                  <input type="radio" name="reason" value="Suspicious Behavior">None<br>
                  <br><input type="radio" name="reason" value="Suspicious Behavior">Includes<br>
                  <div class="panel panel-default">
                    <div class="panel-body shadow p-3">

                        <div class="container">
                            <div class="row">
                              <div class="col-sm">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Medication1
                                </label></div><div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Medication2
                                    </label></div><div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Medication3
                                        </label></div>                              </div>
                              <div class="col-sm">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Medication1
                                </label></div><div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Medication2
                                    </label></div><div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Medication3
                                        </label></div>

                            </div>
                          </div>










</div>
                </form>
              </div>

    </body>
</html>
