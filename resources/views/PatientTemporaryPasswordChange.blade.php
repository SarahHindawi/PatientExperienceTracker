<!--Here is a page for changing password for patients when they have to put they a new one with confirming-->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Patient Password Change</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./cssFile.css">

</head>

<!-- the body has the content of the page  -->
<body>
<!-- the navigation bar in the top-->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand"></a>
        <!-- the button of the the drop down for the user in the top right corner-->
        <form class="d-flex">
            <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button"
                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </button>
            <!-- the option of the drop down button-->
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li>
                    <button class="dropdown-item" type="button">Action</button>
                </li>
                <li>
                    <button class="dropdown-item" type="button">Another action</button>
                </li>
                <li>
                    <button class="dropdown-item" type="button">Something else here</button>
                </li>
            </ul>
        </form>
    </div>
</nav>
<!-- the title in the top middle of the page -->
<div style=" margin-top:4%; margin-left:-1cm">
    <p class="text-center h4">Here you can change the password of your account.</p>
    <p class="text-center h4">See password rules below</p>
</div>

<!-- the form where patient have to change the password-->
<form method="post" action="/setpassword" enctype="multipart/form-data">
    @csrf
    <div style="width: 550px; margin-left:4cm; margin-top:6%">
        <!-- the box for new password-->
        <div class="mb-7 row">
            <label for="inputFirstName" class="col-sm-4 col-form-label">New Password: </label>
            <div class="col-sm-5">
                <input type="password" style="width:7cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                       id="newPassword" name="newPassword">
            </div>
        </div>
        <!-- the box for new password confirmation -->
        <div class="mb-7 row">
            <label for="inputFirstName" class="col-sm-4 col-form-label">Confirm New Password: </label>
            <div class="col-sm-5">
                <input type="password" style="width:7cm" class="form-control shadow-lg p-2 mb-3 bg-white rounded"
                       id="confirmPassword">
            </div>
        </div>
    </div>
    <!-- the panel where the rule of the password creation should achieve-->
    <div class="card panel-body shadow p-3"
         style="width: 25rem;height: 15rem;;margin-left: 27cm; margin-top: -5cm;">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Password needs to be between 8 and 20 charachters</h6>
            <br><br>
            <h6 class="card-subtitle mb-2 text-muted">Password Must Contain:</h6>
            <h6 class="card-subtitle mb-2 text-muted">-At least one lowercase letter</h6>
            <h6 class="card-subtitle mb-2 text-muted">-At least one uppercase letter</h6>
            <h6 class="card-subtitle mb-2 text-muted">-At least one digit</h6>
        </div>
    </div>
    <br><br>
    <!-- the submit button-->
    <div style="margin-left:18cm;">
        <button style="width: 200px;" type="submit" class="btn btn-success btn-rounded">Submit</button>
    </div>
</form>


</body>

</html>
