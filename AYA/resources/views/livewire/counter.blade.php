<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AYA</title>
    @livewireStyles
</head>

<body class="c-app">
    <div id="app">
        @livewire('counter')
        {{-- style="background-image:url({{ url('images/home2.jpg') }});
            background-size:cover;background-attachment:fixed"> --}}
        <div style="text-align: center">
            <button wire:click="increment">+</button>
            {{-- <h1>{{ $count }}</h1> --}}
            <h1>test</h1>
            <button wire:click="decrement">-</button>
        </div>
    </div>
    @livewireScripts
</body>

</html>
