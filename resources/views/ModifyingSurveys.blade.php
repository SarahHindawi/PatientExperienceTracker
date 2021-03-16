<!-- this page is when admin will be able to add or remove survey questions-->
<!DOCTYPE html>
<html>
<!-- the head has the title of the page and the link for Bootstrap Framework and the link for the css file  -->
<head>
    <title>Modify Survey</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cssFile.css')}}">
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
<div style=" margin-top:5%; margin-left:10%">
    <p class="text-center h2">Modify Survey</p>
</div>

<!-- the Dashboard of the page that has different options-->
<div class="msb" id="msb">
    <p class="text-center fs-2">PET</p>

    <nav class="navbar navbar-default" role="navigation">
        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
            <ul class="nav flex-column" style="width:100%">
                <!-- the Dashboard options-->
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
                                              href="#">Dashboard</a></p>
                </li>
                <li class="nav-item">
                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Patient
                            Registration</a></p>
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
<!-- an example on how to add or remove survey questions-->
<form>
    <!-- button to edit PROM survey questions-->
    <button style="width: 200px; margin:28%; margin-top:3%" type="button" class="btn btn-success btn-rounded">Edit
        PROM
    </button>
    <!-- button to edit PREM survey questions-->
    <button style="width: 200px; margin-right:12%; margin-top:-25%" type="button"
            class="btn btn-success btn-rounded">Edit PREM
    </button>
    <div style="width: 1100px; margin:20%; margin-top:-27%" class="shadow-lg p-3 mb-5 bg-white rounded">
        <br>
        <!-- button to add question-->
        <a href="#"> <img alt="Qries" src="./blue cross.png" width="5%" height="5%"></a>

        <p class="double"></p>
        <a href="#">
            <!-- button to remove question-->
            <img alt="Qries" src="./red X.png" width="2%" height="2%"></a>
        <!-- an example of survey question with radio buttons-->
        <p class="h6 ">This is an example of a Radio Button Question Type. These Questions will allows election of
            one
            item from a list.</p>
        <p class="h6"> Typically rating. Example How would you rate how you feel today?</p>
        <!-- radio options-->
        <div class="form-check form-check-inline" style=" margin-left: 310px">
            <label><input type="radio" name="optradio" checked>Poor</label>
        </div>
        <div class="form-check form-check-inline">
            <label><input type="radio" name="optradio">Fair</label>
        </div>
        <div class="form-check form-check-inline">
            <label><input type="radio" name="optradio">Good</label>
        </div>
        <div class="form-check form-check-inline">
            <label><input type="radio" name="optradio">Very Good</label>
        </div>
        <div class="form-check form-check-inline">
            <label><input type="radio" name="optradio">Excellent</label>
        </div>
        </p>

        <a href="#"><img alt="Qries" src="./blue cross.png" width="5%" height="5%"></a>
        <p class="double"></p>
        <a href="#">
            <img alt="Qries" src="./red X.png" width="2%" height="2%"></a>
        <!-- another example of survey question with check boxes-->
        <p class="h6 ">This is an example of a Checkbox Question type. These Questions will allows selsctio of
            multiple
            items from a list.</p>
        <p class="h6"> Example:What symptoms are you feeling?(Select all that apply)</p>
        <!-- check boxes-->
        <div class="form-check form-check-inline" style=" margin-left: 360px">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Item1</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Item2</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Item3</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Item4</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Item5</label>
        </div>
        </p>
        <br>
    </div>
    <!-- to add a new question to a survey-->
    <div style="margin:15%; margin-top:3% ;">
        <br>
        <p style=" margin-left: 60px" class="h4">Add Question:</p>
        <!-- question position in a survey-->
        <label for="input" style=" width: 220px" class="col-sm-2 col-form-label">Question Position Before #</label>
        <input type="text" style=" width: 100px" class=" shadow  bg-body rounded" id="input">

        <!-- question type in a survey-->
        <br><label for="input" style=" width: 200px" class="col-sm-2 col-form-label">Question Type</label>
        <select style=" width: 200px" class="shadow  bg-body rounded" id="inlineFormSelectPref">
            <option selected>Choose...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>

        <div style="width: 400px; margin-left:70%; margin-top:-8%; height: 20px;">
            <!--  text of the question that needs to be added in a survey-->
            <label for="input" style=" width: 200px" class="col-sm-2 col-form-label">Question text:</label>
            <div class="form-floating">
                <!-- text area-->
                <textarea style="height: 2cm; " class="shadow-sm form-control" placeholder="Leave a comment here"
                              id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Question</label>
            </div>
            <!-- how the answer of the question would be-->
            <br><label for="input" style=" width: 500px" class="col-sm-2 col-form-label">Question Responses(If
                required., Seperate with a Comma No Spaces:</label>
            <div class="form-floating">
                <!-- text area-->
                <textarea style="height: 2cm; " class="shadow-sm form-control" placeholder="Leave a comment here"
                              id="floatingTextarea"></textarea>
            </div>
        </div>
    </div>
    <!-- a submit button-->
    <div style=" height: 4cm;">
        <button style="width: 5cm; margin-left: 19cm; margin-top:2cm; " type="button"
                class="btn btn-success btn-rounded">Submit
        </button>
    </div>
</form>

</body>

</html>
