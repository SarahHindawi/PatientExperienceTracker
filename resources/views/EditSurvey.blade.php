<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
<div class="container">
    <form name="surveyForm" method="post" action="/editSurvey" enctype="multipart/form-data">
        @csrf

        <h1>
            PREM Survey
        </h1>

        @foreach ($questions as $q)
            <label> {{$q["Text"]}}</label> <!--Display the question-->

            @if ( $q["Type"]  == "DropDown")
                <select name="{{$q["Text"]}}">

                    <!--iterate over the options-->
                    @foreach(explode(",",$q['PossibleResponses']) as $option)
                        <option value="{{$option}}">{{$option}}</option>
                    @endforeach
                    <br>
                </select>
                <br> <br>

            @elseif ($q["Type"]  == "Checkbox")

            <!--TODO fix: checking more than one box returns only the last checked box-->
                @foreach(explode(",",$q['PossibleResponses']) as $option)
                    <input type="checkbox" name="{{$q["Text"]}}" value="{{$option}}">
                    <label>{{$option}}</label>
                @endforeach
                <br>
                <br> <br>

            @elseif ($q["Type"]  == "Radio")

                @foreach(explode(",",$q['PossibleResponses']) as $option)
                    <input type="radio" name="{{$q["Text"]}}" value="{{$option}}">
                    <label>{{$option}}</label>
                @endforeach
                <br>
                <br> <br>

            @elseif ($q["Type"]  == "Text")
                <input type="text" name="{{$q["Text"]}}"><br>
                <br>
                <br> <br>

            @elseif ($q["Type"]  == "TextArea")
                <textarea name="{{$q["Text"]}}"></textarea>
                <br> <br>
            @endif

        @endforeach

        <button style="width: 200px;" type="submit" class="btn btn-success btn-rounded">Search</button>
    </form>
</div>
</body>
</html>
