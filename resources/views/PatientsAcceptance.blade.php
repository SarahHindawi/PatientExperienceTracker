<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        [type=radio] + img {
            cursor: pointer;
        }

        [type=radio]:checked + img {
            outline: 2px solid #f00;
        }
    </style>
</head>
<body>
<div class="container">

    <h1>
        List of New Patients
    </h1>

    <form name="acceptanceForm" method="post" action="/accept" enctype="multipart/form-data">
    @csrf

    <!-- for each name in the passed list of new patients -->
        @foreach ($patients as $p)
            <label> {{$p}}</label>
            <label>
                <input type="radio" name="data[{{$p}}]" value="Accept">
                <img width="30" height="30" src="https://freeiconshop.com/wp-content/uploads/edd/checkmark-flat.png">
            </label>

            <label>
                <input type="radio" name="data[{{$p}}]" value="Remove">
                <img width="30" height="30"
                     src="https://icons-for-free.com/iconfiles/png/512/cercle+close+delete+dismiss+remove+icon-1320196712448219692.png">
            </label>

            <br> <br>
        @endforeach

        <button>Save</button>
    </form>
</div>
</body>
</html>
