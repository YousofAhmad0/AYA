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
        <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top">
            <div class="container">
                <h3>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        AYA
                    </a>
                </h3>
                @guest
                    <li class="nav-item">
                        Welcome
                    </li>
                @else
                    <li class="nav-item">
                        Welcome {{ Auth::user()->fname }} {{ Auth::user()->lname }}
                    </li>
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('reservation.index') }}">
                                    To Reservation
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('reservation.index') }}">
                                    To Reservation
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('reservation.index') }}">
                                    To Reservation
                                </a>
                            </li>

                            <div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="cardRegister">
                            <div class="card-header" style="color:white; text-align: center;font-size:30px">
                                {{ __('Register') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    {{-- begin first name --}}
                                    <div class="row mb-3">
                                        <label for="fname" class="col-md-4 col-form-label text-md-end"
                                            style="color:white">{{ __('First Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="fname" type="text" class="form-control" name="fname"
                                                value="{{ old('fname') }}" autocomplete="fname" autofocus>
                                        </div>
                                    </div>
                                    {{-- end first name --}}
                                    {{-- begin last name --}}
                                    <div class="row mb-3">
                                        <label for="lname" class="col-md-4 col-form-label text-md-end"
                                            style="color:white">{{ __('Last Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="lname" type="text" class="form-control" name="lname"
                                                value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                                        </div>
                                    </div>
                                    {{-- end last name --}}
                                    {{-- begin Email --}}
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end"
                                            style="color:white">{{ __('Email Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- end Email --}}
                                    {{-- begin address --}}
                                    <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-form-label text-md-end"
                                            style="color:white">{{ __('Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="address" type="text" class="form-control" name="address"
                                                value="{{ old('address') }}" required autocomplete="address"
                                                autofocus>
                                        </div>
                                    </div>
                                    {{-- end address --}}
                                    {{-- begin phone --}}
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-form-label text-md-end"
                                            style="color:white">{{ __('Phone') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="number" class="form-control" name="phone"
                                                value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                        </div>
                                    </div>
                                    {{-- end phone --}}
                                    {{-- begin password --}}
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end"
                                            style="color:white">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- end password --}}
                                    {{-- begin Cpassword --}}
                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end"
                                            style="color:white">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    {{-- end Cpassword --}}
                                    {{-- begin btn --}}
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btnLogin">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                    {{-- end btn --}}

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
