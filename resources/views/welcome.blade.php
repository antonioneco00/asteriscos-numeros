<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Asteriscos y números</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/logo.png')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jQuery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/responsive/responsive.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body id="welcome-body">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            @include('includes/navbar')
        </nav>
        
        <div id="welcome" class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="w-75 display-3 text-center">Bienvenido a la web más amplia de figuras hechas con código</h1>

            <p class="w-75 text-center lead">
                ¿Alguna vez te has encontrado con esos ejercicios de programación que consisten en programar figuras
                y que dan tantos quebraderos de cabeza?
                ¡Únete y aprende de una vez por todas!
            </p>
        </div>
        <div class="wave">
            <img src="{{asset('img/wave.svg')}}" alt="Wave">
        </div>
        <div id="tutorial" class="d-flex align-items-center justify-content-evenly text-center">
            <div class="welcome-text-div" id="tutorial-text">
                <h1 class="display-3">Tutorial</h1>

                <p class="lead">
                    En nuestro tutorial aprenderás cómo utilizar los bucles para crear distintas matrices,
                    y según el uso de condicionales, podrás imprimir la figura que desees
                </p>
                <a href="{{route('home')}}" class="btn-grad btn-grad-md btn-grad-light">
                    Acceder
                </a>
            </div>
            <div class="clearfix"></div>
            <div class="align-self-center" id="tutorial-table">
                <table class="table table-bordered">
                    <tr>
                        <th class="bg-primary text-light">Variables</th>
                        @for($j = 0; $j < 5; $j++)
                            <th class="bg-primary text-light">$j = {{$j}}</th>
                        @endfor
                    </tr>
                    @for($i = 0; $i < 5; $i++)
                        <tr>
                            <th class="bg-primary text-light">$i = {{$i}}</th>

                            @for($j = 0; $j < 5; $j++)
                                @if($i % 2 == 0)
                                    <td class="table-primary">{{$i + $j}}</td>
                                @else
                                    <td>{{$i + $j}}</td>
                                @endif
                            @endfor
                        </tr>
                    @endfor
                </table>
            </div>
        </div>
        <div class="wave wave-rotate">
            <img src="{{asset('img/wave.svg')}}" alt="Wave">
        </div>
        <div id="upload" class="d-flex flex-row justify-content-evenly text-center">
            <div class="welcome-text-div" id="upload-text">
                <h1 class="display-3">Subir figuras</h1>

                <p class="lead">
                    También podrás compartir las figuras que aprendas a hacer conforme mejores tus habilidades
                    de programación con bucles y condicionales.
                </p>
                <a href="{{route('register')}}" class="btn-grad btn-grad-md btn-grad-dark">
                    ¡Únete!
                </a>
            </div>
        </div>
        <div class="wave wave-dark">
            <img src="{{asset('img/wave-black.svg')}}" alt="Wave">
        </div>
        <footer class="text-light pb-1" id="footer">
            <h1>Desarrollado por Antonio Nevado Contreras &copy;</h1>
        </footer>
    </div>
</body>
</html>
