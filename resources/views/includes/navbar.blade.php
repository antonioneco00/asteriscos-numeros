            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/logo.png')}}" width="30" height="30" class="d-inline-block align-top" id="logo" alt="Logo">
                    <h1 class="consolas">asteriscos-numeros</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav text-center">
                        <li class="nav-item">
                            <a class="nav-link hover-scale" href="{{ route('home') }}">Tutorial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-scale" href="{{ route('figure.index') }}">Figuras</a>
                        </li>
                        <li class="nav-item dropdown screen-lg">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Tipos
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'asteriscos']) }}">
                                    Asteriscos
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'numeros']) }}">
                                    Números
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'otro']) }}">
                                    Otro
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown screen-lg">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Categorías
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'categoria', 'category' => 'cuadrados']) }}">
                                    Cuadrados
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'categoria', 'category' => 'escaleras']) }}">
                                    Escaleras
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'categoria', 'category' => 'picos']) }}">
                                    Picos
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'categoria', 'category' => 'lineas']) }}">
                                    Líneas
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'categoria', 'category' => 'piramides']) }}">
                                    Pirámides
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'categoria', 'category' => 'rombos']) }}">
                                    Rombos
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'categoria', 'category' => 'pentagonos']) }}">
                                    Pentágonos
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'categoria', 'category' => 'estrellas']) }}">
                                    Estrellas
                                </a>
                                <a class="dropdown-item" href="{{ route('figure.index', ['type' => 'categoria', 'category' => 'otros']) }}">
                                    Otros
                                </a>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link hover-scale" href="{{ route('login') }}">Iniciar sesión</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link hover-scale" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link hover-scale" href="{{ route('figure.create') }}">Subir figura</a>
                            </li>
                            <li class="nav-item dropdown" id="user-container">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @include('includes.image')
                                    
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.config') }}">
                                        Configuración
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item screen-md">
                                <a class="nav-link hover-scale" href="{{ route('user.config') }}">Configuración de usuario</a>
                            </li>
                            <li class="nav-item screen-md">
                                <a class="nav-link hover-scale" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                            </li>
                        @endguest

                        <li class="nav-item">
                            <div id="theme" onclick="themeDark()">
                                <img src="{{asset('img/sun.png')}}" alt="Tema claro" class="icon ms-2 sun">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>