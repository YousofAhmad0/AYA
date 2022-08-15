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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color:white; text-align: center;font-size:30px">
                        Your order was succesfully submitted, it will be delivered to you as soon as posible!
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <u>Order details:</u>
                            </li>
                            <li class="list-group-item">
                                Restaurant name: {{ $resName }}
                            </li>
                            <li class="list-group-item">
                                Description: {{ $desc }}
                            </li>
                            <li class="list-group-item">
                                Total price: {{ $totalPrice }}
                            </li>
                            <li class="list-group-item">
                                Address: {{ $address }}
                            </li>
                        </ul>
                        <a class="btnLogin" href="{{ route('home.index') }}">Back to
                            orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
