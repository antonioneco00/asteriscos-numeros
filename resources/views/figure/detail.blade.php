@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes/message')
            
            <div class="card mb-4">
                <div class="card-header text-center bg-info text-light"><h1 class="mb-0 consolas">{{$figure->name}}</h1></div>

                <div class="d-flex" id="detail-container">    
                    <div class="d-flex flex-column" id="figure-container">
                        <div class="card-header text-center light-blue">Figura</div>
                        <div class="card-body d-flex align-items-center justify-content-center text-center" id="figure">{{eval('?>' . $figure->code)}}</div>
                    </div>

                    <div id="code-container">
                        <div class="card-header text-center light-blue">Código</div>
                        <div class="card-body" id="code"><?=highlight_string($figure->code, true)?></div>
                    </div>
                </div>

                <div class="d-flex" id="footers">
                    <div class="d-flex justify-content-center align-items-center card-footer w-100 text-light text-center bg-info">Creado por {{$figure->user->name}} hace {{\FormatTime::LongTimeFilter($figure->created_at)}}</div>
                    
                    @guest
                        <a class="d-flex justify-content-center align-items-center card-footer w-100 text-center bg-light" href="{{route('register')}}">
                            Regístrate para dar me gusta
                        </a>
                    @else
                        @if($user_like)
                            <a class="d-flex justify-content-center align-items-center card-footer w-100 text-center bg-light btn-remove-like" data-id="{{$figure->id}}" href="#">
                                <p>Likes: {{count($figure->likes)}}</p>

                                <img src="{{asset('img/like-blue.png')}}" alt="Quitar like" class="remove-like-symbol">
                            </a>
                        @else
                            <a class="d-flex justify-content-center align-items-center card-footer w-100 text-center bg-light btn-like" data-id="{{$figure->id}}" href="#">
                                <p>Likes: {{count($figure->likes)}}</p>

                                <img src="{{asset('img/like-dark.png')}}" alt="Like" class="like-symbol">
                            </a>
                        @endif
                    @endguest
                </div>

                <div class="card-body">
                    <strong>Tipo: </strong>{{$figure->type}} <br>
                    <strong>Categoría: </strong>{{$figure->category}} <br>
                    <strong>Descripción: </strong>{{$figure->description}} <br>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header text-center bg-info">Comentarios</div>

                <div class="card-body">
                    @foreach($figure->comments as $comment)
                        <div class="comment">
                            <h2>{{$comment->user->name}}</h2>
                            <p>{{$comment->content}}</p>
                        </div>

                        <hr>
                    @endforeach

                    @guest
                        <h2 class="text-center mb-3">Necesitas registrarte para dejar un comentario</h2>

                        <a href="{{route('register')}}" class="btn-grad btn-grad-md btn-grad-light text-center">Registrarse</a>
                    @else
                        <form action="{{route('comment.save')}}" method="post">
                            @csrf

                            <input type="hidden" name="figure_id" value="{{$figure->id}}">

                            <label for="content"><h2>Añadir comentario</h2></label>

                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="4"></textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input type="submit" value="Enviar" class="btn-grad btn-grad-md btn-grad-light">
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
