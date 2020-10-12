<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" /> 
        <title>Registra tu contrato</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{asset('semantic/dist/semantic.css') }}">
        <link rel="stylesheet" href="{{asset('css/style.css') }}">
        <link rel="stylesheet" href="{{asset('css/main.css') }}">
        <link rel="stylesheet" href="{{asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{asset('css/margin-padding-classes.css') }}">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <script src="{{asset('semantic/dist/semantic.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{asset('js/main.js') }}"></script>
        <script src="{{asset('js/msg.js') }}"></script>
        <script>var baseurl = '{{ url("/") }}';</script>

    </head>
    <body>
        <div class="ui dimmer active hide-dimmer" id="loader">
            <div class="ui text loader">Cargando</div>
        </div>
        @section('header')
        @include('user.login')
        @include('layout.sidebar')
        @include('layout.header')
        <div class="pusher">

            @yield('content')

            @section('footer')
            @show
        </div>

    </body>

</html>
