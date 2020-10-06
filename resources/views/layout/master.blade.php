<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" /> 
        <title>Registra tu contrato</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>-->
        <!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"/>-->
        <link rel="stylesheet" type="text/css" href="{{asset('semantic/dist/semantic.css') }}">
        <script src="{{asset('semantic/dist/semantic.min.js') }}"></script>
    </head>
    <body>
        @section('header')
        @include('layout.sidebar')
        <div class="pusher">
            @yield('content')

            @section('footer')
            @show
        </div>
    </body>
</html>
