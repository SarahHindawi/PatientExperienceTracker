<!--/*-->
<?php
////
////namespace Tests\Unit;
////
//////use Tests\TestCase;
////use PHPUnit\Framework\TestCase;
////use ReflectionClass;
////use Illuminate\Support\Str;
////use Tests\Unit\GenerateReport;
////
////class TestGenerateReport extends TestCase
////{
////    /**
////     * A basic test example.
////     *
////     * @return void
////     */
////    public function testBasicTest()
////    {
////        $this->assertTrue(true);
////    }
////
////    public function partitionDataAndAttributes($class, array $attributes)
////    {
////        $constructor = (new ReflectionClass($class))->getConstructor();
////
////        $parameterNames = $constructor
////            ? collect($constructor->getParameters())->map->getName()->all()
////            : [];
////
////        return collect($attributes)->partition(function ($value, $key) use ($parameterNames) {
////            return in_array(Str::camel($key), $parameterNames);
////        });
////    }
////
////    public function rendered(string $component, array $data = [])
////    {
////        [$data, $attributes] = $this->partitionDataAndAttributes($component, $data);
////
////        $component = $this->app->make($component, $data->all());
////
////        $component->withAttributes($attributes->all());
////
////        $view = $component->resolveView();
////
////        $view->with($component->data());
////
////        return trim($view->render());
////    }
////
////    public function test_it_compiles_with_default_attributes()
////    {
////        $expected = <<<HTML
////<input type="text">
////HTML;
////
////        $compiled = $this->rendered(GenerateReport::class);
////
////        $this->assertSame($expected, $compiled);
////    }
////
////}
//
//
//
//declare(strict_types=1);
//namespace Tests\Unit;
//
//use Dries\Icons\BladeIconsServiceProvider;
////use Illuminate\Support\Facades\View;
//use PHPUnit\Framework\TestCase;
//
//class TestGenerateReport extends TestCase
//{
//    /** @test */
//
//    public function it_compiles_a_single_anonymous_component()
//    {
//        $result = trim(View::file(__DIR__ .'C:\Users\Nairouz Mayaleh\Desktop\Graduation Project\PatientExperienceTracker\resources\views\GeneratReport.blade.php')->render());
//
//        // Note: the empty class here seems to be a Blade components bug.
//        $expected = <<<HTML
//<!DOCTYPE html>
//<html>
//
//<head>
//    <meta name="viewport" content="width=device-width, initial-scale=1.0">
//
//    <title>Generate Report</title>
//    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
//          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
//    <link rel="stylesheet" type="text/css" href="./cssFile.css">
//    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
//
//</head>
//
//<body>
//<nav class="navbar navbar-light bg-light">
//    <div class="container-fluid">
//        <a class="navbar-brand" href="#">Default</a>
//        <form class="d-flex">
//            @csrf
//            <button class="btn btn-success btn-rounded w-100 btn-lg dropdown-toggle drop" type="button"
//                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
//                Dropdown
//            </button>
//            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
//                <li>
//                    <button class="dropdown-item" type="button">Action</button>
//                </li>
//                <li>
//                    <button class="dropdown-item" type="button">Another action</button>
//                </li>
//                <li>
//                    <button class="dropdown-item" type="button">Something else here</button>
//                </li>
//            </ul>
//        </form>
//    </div>
//</nav>
//
//<div style=" margin-top:5%; margin-left:10%">
//    <p class="text-center h2">Generate Report</p>
//</div>
//
//
//<div class="msb" id="msb">
//    <p class="text-center fs-2">PET</p>
//
//    <nav class="navbar navbar-default" role="navigation">
//        <div class="btn-group-vertical" style=" margin-top:15%; width:100%">
//            <ul class="nav flex-column" style="width:100%">
//                <li class="nav-item">
//                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
//                                              href="#">Dashboard</a></p>
//                </li>
//                <li class="nav-item">
//                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Patient
//                            Registeration</a></p>
//                </li>
//                <li class="nav-item">
//                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
//                                              href="#">Password Reset</a></p>
//                </li>
//                <li class="nav-item">
//                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Patient
//                            Summary</a></p>
//                </li>
//                <li class="nav-item">
//                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page"
//                                              href="#">Generate Report</a></p>
//                </li>
//                <li class="nav-item">
//                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Modify
//                            Survey</a></p>
//                </li>
//                <li class="nav-item">
//                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Change
//                            Password</a></p>
//                </li>
//                <li class="nav-item">
//                    <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">Admin
//                            Help</a></p>
//                </li>
//            </ul>
//        </div>
//
//    </nav>
//</div>
//
//
//<form name="surveyForm" method="post" action="/report" enctype="multipart/form-data">
//    @csrf
//    <div style="width:device-widthx; margin:15%; margin-top:3%; height: 12cm;">
//        <br>
//        <p class="h6">Survey Desired:</p>
//        <select class="shadow  bg-body rounded" aria-label="Default select example" name="surveyName">
//            @foreach ($surveys as $s)
//                <option value="{{$s}}">{{$s}}</option>
//            @endforeach
//        </select>
//        <br> <br>
//        <br>
//        <p class="h6">Gender:</p>
//        <div class="form-check form-check-inline">
//            <label><input type="radio" name="gender" value="all" checked> Any</label>
//        </div>
//        <div class="form-check form-check-inline">
//            <label><input type="radio" name="gender" value="male"> Male</label>
//        </div>
//        <div class="form-check form-check-inline">
//            <label><input type="radio" name="gender" value="female"> Female</label>
//        </div>
//        <br>
//
//        <br>
//        <p class="h6">Age:</p>
//        <input type="radio" name="age" value="all" checked>All<br>
//        <br><input type="radio" name="age" value="above"> Above: <input type="text" class="shadow  bg-body rounded"
//                                                                        name="ageAbove" style="width: 50px ">
//        <br><br><input type="radio" name="age" value="below"> Below: <input type="text" class="shadow  bg-body rounded"
//                                                                            name="ageBelow" style="width: 50px "/><br>
//        <br><input type="radio" name="age" value="equals"> Equals: <input type="text" class="shadow  bg-body rounded"
//                                                                          name="ageEquals" style="width: 50px"/><br>
//
//        <br>
//        <p class="h6">Weight:</p>
//        <input type="radio" name="weight" value="all" checked>All<br>
//        <br><input type="radio" name="weight" value="above"> Above: <input type="text" class="shadow  bg-body rounded"
//                                                                           name="weightAbove" style="width: 50px ">
//        <br><br><input type="radio" name="weight" value="below"> Below: <input type="text"
//                                                                               class="shadow  bg-body rounded"
//                                                                               name="weightBelow" style="width: 50px "/><br>
//        <br><input type="radio" name="weight" value="equals"> Equals: <input type="text" class="shadow  bg-body rounded"
//                                                                             name="weightEquals"
//                                                                             style="width: 50px"/><br>
//
//
//        <div style="width: 300px; margin:90%; margin-top:-47%; height: 2cm;">
//            <p class="h6">Height:</p>
//            <input type="radio" name="height" value="all" checked> All<br>
//            <br><input type="radio" name="height" value="above"> Above: <input type="text"
//                                                                               class="shadow  bg-body rounded"
//                                                                               name="heightAbove" style="width: 50px ">
//            <br><br><input type="radio" name="height" value="below"> Below: <input type="text"
//                                                                                   class="shadow  bg-body rounded"
//                                                                                   name="heightBelow"
//                                                                                   style="width: 50px "/><br>
//            <br><input type="radio" name="height" value="equals"> Equals: <input type="text"
//                                                                                 class="shadow  bg-body rounded"
//                                                                                 name="heightEquals"
//                                                                                 style="width: 50px"/><br>
//
//            <br>
//            <p class="h6">Medication:</p>
//            <input type="radio" name="medicationUsage" value="none" checked> None<br>
//            <br><input type="radio" name="medicationUsage" value="includes"> Includes<br>
//            <div class="panel panel-default">
//                <div style="width: 330px;margin-right: 35px;" class="panel-body shadow p-3">
//
//                    <div class="container">
//                        <div class="row align-items-start">
//
//                            @foreach ($medications as $m)
//
//                                <div class="col">
//                                    <div class="form-check">
//                                        <input class="form-check-input" type="checkbox" name = "medication[]" value="{{$m}}" id="flexCheckDefault">
//                                        <label class="form-check-label" for="flexCheckDefault">
//                                            {{$m}}
//                                        </label>
//                                    </div>
//                                </div>
//                            @endforeach
//
//                        </div>
//                    </div>
//                </div>
//            </div>
//        </div>
//    </div>
//
//    <button style="width: 5cm; margin-left: 19cm; margin-bottom:1cm; " type="submit"
//            class="btn btn-success btn-rounded">Submit
//    </button>
//
//</form>
//
//</body>
//
//</html>
//HTML;
//
//        $this->assertSame($expected, $result);
//    }
//
//    protected function getPackageProviders($app)
//    {
//        return [BladeIconsServiceProvider::class];
//    }
//}

