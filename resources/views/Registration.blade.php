<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/reg.css')}}">


    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            </div>
          </nav>

            <h2 style="text-align: center;color:seagreen">Welcome To Patient Experience Tracker</h2>
            <p class="text-center h4">Sign Up as New User</p>

        <div class="msb" id="msb">
            <p class="text-center fs-2">PET</p>

            <nav class="navbar navbar-default" role="navigation">
                <div class="btn-group-vertical" style=" margin-top:0%; width:0%">
                    <ul class="nav flex-column" style="width:10%">
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src = "signup.png" width="25" height="25" class="d-inline-block align-right"> Sign Up
                            </a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                    <img src = "key.png" width="25" height="25" class="d-inline-block align-right">  Patient Login
                            </a></p>
                        </li>
                      </ul>
                    </div>
                </nav>
            </div>
            <form method = "post" action = "">
                <br><br><br>
                <p style = "color:red;"><strong>All fields are required</strong> </p>
                <!-- create four text boxes for user input -->
                <div><label>First name:</label>
                   <input type = "text" name = "fname" placeholder = "First Name" ></div>
                <div><label>Last name:</label>
                   <input type = "text" name = "lname" placeholder = "Last Name"></div>
                <div><label>Email:</label>
                   <input type = "text" name = "email" placeholder = "user@example.com"></div>
                <br>
                <form class="row row-cols-lg-auto g-3 align-items-center">
                      <div class="col-12">
                          <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                          <select class="form-select" id="inlineFormSelectPref">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                          <br>
                          <div class="row">
                                <div class="col">
                                  <input type="text" class="form-control" placeholder="Your Height" aria-label="Your Height">
                                </div>
                                <div class="col">
                                  <input type="text" class="form-control" placeholder="Your Weight" aria-label="Your Weight">
                                </div>
                              </div>
                        </div>
                        <div class="form-group">
                                <label for="exampleFormControlTextarea1">Medications</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </form>
              </form>
    </body>
</html>
