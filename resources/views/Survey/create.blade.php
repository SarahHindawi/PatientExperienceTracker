<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

@section('content')
    <div class="container">
        <form name="surveyForm" method="post" action="/form" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <h1>
                    PREM Survey
                </h1>
            </div>
            <div class="form-group row">
                <label for="disease"
                       class="col-md-4 col-form-label text-md-right">{{ __('Health Condition') }}</label>

                <div class="col-md-6">
                    <input id="disease" type="text"
                           class="form-control @error('disease') is-invalid @enderror" name="disease"
                           value="{{ old('disease') }}" required autocomplete="disease" autofocus>

                    @error('disease')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <br>
                    <label for="questionResponse"
                           class="col-md-4 col-form-label text-md-right">{{ __('Medications:') }}</label>

                    <div class="col-md-6">
                        <input id="response" type="text"
                               class="form-control @error('response') is-invalid @enderror" name="response"
                               value="{{ old('response') }}" required autocomplete="name" autofocus>
                    </div>

                    @error('questionResponse')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror


                    <div class="row pt-4">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<main class="py-4">
    @yield('content')
</main>

</body>
</html>
