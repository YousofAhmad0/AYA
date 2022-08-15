<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AYA</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>


    </style>
</head>

<body class="c-app" style="background-image:url({{ url('images/home2.jpg') }});
                                        background-size:cover;background-attachment:fixed;">
    <div id="app">

        <main class="py-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="cardLogin" style="margin-top:100px">
                            <div class="card-header" style="color:white; text-align: center;font-size:30px">
                                {{ __('Login Or Register') }}
                            </div>

                            <div class="card-body" style="text-align: center">
                                <p style="color:white">If you have an account:</p>
                                <a class="btnLogin" href="{{ route('login') }}">{{ __('Login') }}</a>
                                <hr>
                                <p style="color:white">If you don't have an account:</p>
                                <a class="btnLogin" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
