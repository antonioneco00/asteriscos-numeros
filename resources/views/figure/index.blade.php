@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($type && $type != 'categoria' && $category)
                <h1 class="card-header text-center bg-info text-light first-capitalize">{{$category}} hechos con {{$type}}</h1>
            @elseif($type && $type != 'categoria')
                <h1 class="card-header text-center bg-info text-light">Figuras hechas con {{$type}}</h1>
            @elseif($category)
                <h1 class="card-header text-center bg-info text-light text-capitalize">{{$category}}</h1>
            @else
                <h1 class="card-header text-center bg-info text-light">Últimas figuras</h1>
            @endif

            <form action="{{route('figure.index')}}" method="get" class="form form-control bg-light border-0 mb-4">
                <label for="category">Buscar </label>

                <select name="category" class="form-select form-select-index" id="category">
                    <option value="">Todos</option>
                    <option value="cuadrados">Cuadrados</option>
                    <option value="escaleras">Escaleras</option>
                    <option value="picos">Picos</option>
                    <option value="lineas">Líneas</option>
                    <option value="piramides">Pirámides</option>
                    <option value="rombos">Rombos</option>
                    <option value="pentagonos">Pentágonos</option>
                    <option value="estrellas">Estrellas</option>
                    <option value="otros">Otros</option>
                </select>

                <label for="type"> hech@s con </label>

                <select name="type" class="form-select form-select-index" id="type">
                    <option value="categoria">Cualquiera</option>
                    <option value="asteriscos">Asteriscos</option>
                    <option value="numeros">Numeros</option>
                    <option value="otro">Otro</option>
                </select>

                <input type="submit" class="btn-grad btn-grad-sm btn-grad-light ms-2" value="Buscar">
            </form>

            @include('includes.message')

            @if($figures->isEmpty())
                <div class="card text-center">
                    <div class="card-header bg-info text-light">
                        No hay figuras
                    </div>

                    <div class="card-body bg-light">
                        No se han encontrado figuras con los requisitos solicitados
                    </div>
                </div>
            @else
                <div class="mb-4" id="figure-grid">
                    @foreach($figures as $figure)
                        <div class="card">
                            <div class="card-header d-flex justify-content-between bg-info">
                                @guest
                                    <a href="{{route('figure.detail', ['id' => $figure->id])}}" class="fw-bold text-light mt-1 consolas">{{$figure->name}}</a>
                                @else
                                    @if($figure->user->id == Auth::user()->id || Auth::user()->role == 'admin')
                                        <div class="edit">
                                            <a href="{{route('figure.edit', ['id' => $figure->id])}}"><img src="{{asset('img/edit.png')}}" alt="Editar"></a>
                                        </div>
                                    @endif

                                    <a href="{{route('figure.detail', ['id' => $figure->id])}}" class="text-light mt-1 fw-bold consolas">{{$figure->name}}</a>

                                    @if($figure->user->id == Auth::user()->id || Auth::user()->role == 'admin')
                                        <div class="delete">
                                            <a href="{{route('figure.delete', ['id' => $figure->id])}}"><img src="{{asset('img/delete.png')}}" alt="Eliminar"></a>
                                        </div>
                                    @endif
                                @endguest
                            </div>

                            <div class="card-body bg-light d-flex justify-content-center align-items-center text-dark">{{eval('?>' . $figure->code)}}</div>

                            <div class="d-flex card-footer justify-content-between light-blue">
                                <div class="d-flex">
                                    <div class="image-container">
                                        <img src="{{route('user.image', ['filename' => $figure->user->image_path])}}" alt="Imagen de perfil">
                                    </div>

                                    <p class="mb-0 mt-1">{{$figure->user->name}}</p>
                                </div>

                                @guest
                                    <div class="d-flex justify-content-center align-items-center text-center btn-like btn-like-index" href="{{route('register')}}">
                                        <img src="{{asset('img/like-dark.png')}}" alt="Like" class="like-symbol">

                                        <p class="text-info mt-1 mb-0 ms-2">{{count($figure->likes)}}</p>
                                    </div>
                                @else
                                    @if(array_search($figure->id, $likedFigures))
                                        <div class="d-flex justify-content-center align-items-center text-center btn-remove-like btn-like-index" data-id="{{$figure->id}}">
                                            <img src="{{asset('img/like-blue.png')}}" alt="Quitar like" class="remove-like-symbol">

                                            <p class="text-info mt-1 mb-0 ms-2">{{count($figure->likes)}}</p>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-center align-items-center text-center btn-like btn-like-index" data-id="{{$figure->id}}">
                                            <img src="{{asset('img/like-dark.png')}}" alt="Like" class="like-symbol">

                                            <p class="text-info mt-1 mb-0 ms-2">{{count($figure->likes)}}</p>
                                        </div>
                                    @endif
                                @endguest
                            </div>
                        </div>
                    @endforeach
                </div>

                <span>{{$figures->links()}}</span>
            @endif
        </div>
    </div>
</div>
@endsection
