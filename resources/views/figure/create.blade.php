@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-center">Subir figura</div>
                <div class="card-body">
                    <form action="{{route('figure.save')}}" method="post">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">Tipo</label>

                            <div class="col-md-6">
                                <select name="type" id="type" class="form-select w-100" required>
                                    <option value="asteriscos">Asteriscos</option>
                                    <option value="numeros">Numeros</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">Categoría</label>

                            <div class="col-md-6">
                                <select name="category" id="category" class="form-select w-100" required>
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
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">Código PHP</label>

                            <div class="col-md-6 col-form-label">
                                <p>{{$phpTag}}</p>
                                <p>{{$preStart}}</p>
                                <textarea name="code" class="w-100" id="code" rows="12" required></textarea>
                                <p>{{$preEnd}}</p>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Descripción (opcional)</label>

                            <div class="col-md-6 col-form-label">
                                <textarea name="description" class="w-100" id="description" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Subir" class="btn-grad btn-grad-md btn-grad-light m-0">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
