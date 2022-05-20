@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info text-center">
                    <h1 class="mb-0">Bienvenido al tutorial</h1>
                </div>
                <div class="card-body">
                    <h2 id="tutorial-header">¿Aún no sabes cómo crear tu primera figura? ¡Empieza por aquí!</h2>

                    <p>
                        Como ya sabemos, en los lenguajes de programación modernos, tales como PHP, Java, C++ o Python
                        tenemos estructuras tanto condicionales como repetitivas. Gracias a las estructuras repetitivas,
                        y más en concreto a los bucles <code>for</code>, podemos imprimir un carácter, número o símbolo
                        un número de veces que deseemos sin necesidad de copiar y pegar una misma instrucción una y otra vez.
                    </p>

                    <h2>Fila</h2>

                    <p>
                        Empecemos por lo más sencillo, una simple fila. Dicho lo anterior, imprimir una simple fila tan
                        sólo requiere de un bucle <code>for</code>, de forma que si queremos imprimir una fila de 5 asteriscos,
                        el siguiente código lo mostrará.
                    </p>

                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm">
                                <h3 class="mb-0">Código</h3>
                                <div class="code">
                                    <?=highlight_string($fila, true)?>
                                </div>
                            </div>
                            <div class="col-sm figure-container">
                                <h3 class="mb-0">Figura</h3>
                                
                                <div class="figure d-flex flex-column justify-content-center">
                                    <code>
                                        {{eval('?>' . $fila)}}
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2>Columna</h2>

                    <p>
                        Entonces, ¿cómo creo una columna? Para ello, tenemos que introducir un salto de línea cada vez que
                        se genera un asterisco. Al mismo código de antes, le añadimos <code>&lt;br&gt;</code> en cada iteración.
                    </p>

                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm">
                                <h3 class="mb-0">Código</h3>
                                <div class="code">
                                    <?=highlight_string($columna, true)?>
                                </div>
                            </div>
                            <div class="col-sm figure-container">
                                <h3 class="mb-0">Figura</h3>
                                
                                <div class="figure d-flex flex-column justify-content-center">
                                    <code>
                                        {{eval('?>' . $columna)}}
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2>Cuadrado</h2>

                    <p>
                        Pasemos al siguiente nivel. Ahora tenemos que introducir 2 bucles en los que se crean 2 variables
                        distintas. Veamos el resultado del siguiente código para explicarlo mejor.
                    </p>

                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm">
                                <h3 class="mb-0">Código</h3>
                                <div class="code">
                                    <?=highlight_string($cuadrado, true)?>
                                </div>
                            </div>
                            <div class="col-sm figure-container">
                                <h3 class="mb-0">Figura</h3>
                                
                                <div class="figure d-flex flex-column justify-content-center">
                                    <code>
                                        {{eval('?>' . $cuadrado)}}
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>
                        Como vemos, tenemos un bucle que llamaremos <code>$j</code> que funciona exactamente igual
                        que la fila que ya enseñé arriba. Una vez el bucle <code>$j</code> termina sus iteraciones,
                        hay que tener en cuenta que dicho bucle está dentro de otro denominado <code>$i</code>,
                        que haciendo saltos de línea (<code>&lt;br&gt;</code>), define el número de filas
                        que tendrá la figura. De esta forma, tenemos un conjunto de columnas y filas.
                    </p>

                    <h2>Escalera ascendente</h2>

                    <p>
                        Pero, ¿y cómo se hacen esas escaleras, esas pirámides, esas líneas, esos picos, etc.?
                        Pues aquí llegan los condicionales. Gracias a ellos, podremos decidir si nuestro programa
                        Imprime un asterisco o no. Gracias a los condicionales podemos definir una matriz,
                        que podríamos imaginar que sería algo así.
                    </p>

                    <h3 class="table-header">Matriz $i + $j</h3>

                    <table class="table table-bordered text-center">
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
                                    @if($i + $j == 4)
                                        <td class="table-warning">{{$i + $j}}</td>
                                    @else
                                        <td>{{$i + $j}}</td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </table>

                    <p>
                        Los bucles definen variables que se hacen mayores en cada iteración, de forma que si sumanos
                        <code>$i</code> más <code>$j</code> en cada iteración, creamos una matriz que forma una escalera cuando la suma
                        de ambas variables alcanza el valor <code>4</code>. Si queremos imprimir una escalera ascendente,
                        tenemos que añadir un condicional dentro del bucle <code>$j</code> de forma que únicamente
                        imprimiremos un asterisco cuando la suma de <code>$i</code> y <code>$j</code> sea mayor
                        o igual a <code>4</code>, obteniendo esta matriz.
                    </p>

                    <h3 class="table-header">Condición $i + $j >= 4</h3>

                    <table class="table table-bordered text-center">
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
                                    @if($i + $j >= 4)
                                        <td class="table-primary">{{$i + $j}}</td>
                                    @else
                                        <td>{{$i + $j}}</td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </table>

                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm">
                                <h3 class="mb-0">Código</h3>
                                <div class="code">
                                    <?=highlight_string($escaleraAsc, true)?>
                                </div>
                            </div>
                            <div class="col-sm figure-container">
                                <h3 class="mb-0">Figura</h3>
                                
                                <div class="figure d-flex flex-column justify-content-center">
                                    <code>
                                        {{eval('?>' . $escaleraAsc)}}
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2>Escalera descendente</h2>

                    <p>
                        Entonces, crear una escalera descendente debería ser una tarea muy difícil, ¿verdad?
                        Para nada, podemos crear una matriz que sea una resta de <code>$i</code> menos
                        <code>$j</code>.
                    </p>

                    <h3 class="table-header">Matriz $i - $j</h3>

                    <table class="table table-bordered text-center">
                        <tr>
                            <th class="bg-primary text-light">Variables</th>
                            @for($j = 0; $j < 5; $j++)
                                <th class="bg-primary text-light">$j = {{-$j}}</th>
                            @endfor
                        </tr>
                        @for($i = 0; $i < 5; $i++)
                            <tr>
                                <th class="bg-primary text-light">$i = {{$i}}</th>

                                @for($j = 0; $j < 5; $j++)
                                    @if($i - $j == 0)
                                        <td class="table-warning">{{$i - $j}}</td>
                                    @else
                                        <td>{{$i - $j}}</td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </table>

                    <p>De forma que en el valor 0 tenemos una escalera descendente.</p>

                    <h3 class="table-header">Condición $i - $j >= 0</h3>

                    <table class="table table-bordered text-center">
                        <tr>
                            <th class="bg-primary text-light">Variables</th>
                            @for($j = 0; $j < 5; $j++)
                                <th class="bg-primary text-light">$j = {{-$j}}</th>
                            @endfor
                        </tr>
                        @for($i = 0; $i < 5; $i++)
                            <tr>
                                <th class="bg-primary text-light">$i = {{$i}}</th>

                                @for($j = 0; $j < 5; $j++)
                                    @if($i - $j >= 0)
                                        <td class="table-primary">{{$i - $j}}</td>
                                    @else
                                        <td>{{$i - $j}}</td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </table>

                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm">
                                <h3 class="mb-0">Código</h3>
                                <div class="code">
                                    <?=highlight_string($escaleraDesc, true)?>
                                </div>
                            </div>
                            <div class="col-sm figure-container">
                                <h3 class="mb-0">Figura</h3>
                                
                                <div class="figure d-flex flex-column justify-content-center">
                                    <code>
                                        {{eval('?>' . $escaleraDesc)}}
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2>Pirámide</h2>

                    <p>
                        Visto lo visto, ¿podríamos unir ambas escaleras para dibujar una pirámide? ¡Pues también!
                        Es cuestión de utilizar 2 condicionales, separados por <code>&&</code>. Aunque en este caso,
                        también hay que ampliar el número de columnas, o lo que es lo mismo, introducir un número
                        mayor de iteraciones en <code>$j</code>.
                    </p>

                    <h3 class="table-header">Matriz $i + $j</h3>

                    <table class="table table-bordered text-center">
                        <tr>
                            <th class="bg-primary text-light">Variables</th>
                            @for($j = 0; $j < 9; $j++)
                                <th class="bg-primary text-light">$j = {{$j}}</th>
                            @endfor
                        </tr>
                        @for($i = 0; $i < 5; $i++)
                            <tr>
                                <th class="bg-primary text-light">$i = {{$i}}</th>

                                @for($j = 0; $j < 9; $j++)
                                    @if($i + $j == 4)
                                        <td class="table-warning">{{$i + $j}}</td>
                                    @else
                                        <td>{{$i + $j}}</td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </table>

                    <p>
                        En la matriz <code>$i</code> más <code>$j</code>, vemos que el número <code>4</code> parte de la base
                        y llega al pico.
                    </p>

                    <h3 class="table-header">Matriz $j - $i</h3>

                    <table class="table table-bordered text-center">
                        <tr>
                            <th class="bg-primary text-light">Variables</th>
                            @for($j = 0; $j < 9; $j++)
                                <th class="bg-primary text-light">$j = {{$j}}</th>
                            @endfor
                        </tr>
                        @for($i = 0; $i < 5; $i++)
                            <tr>
                                <th class="bg-primary text-light">$i = {{-$i}}</th>

                                @for($j = 0; $j < 9; $j++)
                                    @if($j - $i == 4)
                                        <td class="table-warning">{{$j - $i}}</td>
                                    @else
                                        <td>{{$j - $i}}</td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </table>

                    <p>
                        Una vez llegado al pico, tenemos que volver a descender hasta la base. En este caso,
                        es más conveniente utilizar la matriz <code>$j</code> menos <code>$i</code> en lugar de
                        <code>$i</code> menos <code>$j</code> para no utilizar números negativos. Igualmente
                        veremos que ese número es el <code>4</code>.
                    </p>

                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm">
                                <h3 class="mb-0">Código</h3>
                                <div class="code">
                                    <?=highlight_string($piramide, true)?>
                                </div>
                            </div>
                            <div class="col-sm figure-container">
                                <h3 class="mb-0">Figura</h3>
                                
                                <div class="figure d-flex flex-column justify-content-center">
                                    <code>
                                        {{eval('?>' . $piramide)}}
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2>Ejercicios numéricos</h2>

                    <p>
                        Además de asteriscos, también podemos imprimir figuras con números. En este ejemplo algo más avanzado
                        vemos como utilizamos 4 matrices distintas, es decir, 4 condicionales. Dichas matrices las creamos
                        sumando o restando ambas variables y otros números si son necesarios, como vemos en el código.
                    </p>

                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm">
                                <h3 class="mb-0">Código</h3>
                                <div class="code">
                                    <?=highlight_string($numeros, true)?>
                                </div>
                            </div>
                            <div class="col-sm figure-container">
                                <h3 class="mb-0">Figura</h3>
                                
                                <div class="figure d-flex flex-column justify-content-center">
                                    <code>
                                        {{eval('?>' . $numeros)}}
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>
                        Por lo demás, si quisiéramos imprimir una figura con cualquier otro símbolo, sería tan simple
                        como cambiar el asterisco por una letra, número o cualquier otro símbolo a la hora de imprimirlo.
                        ¿Estás preparado para subir tu primera figura?
                    </p>

                    <a href="{{route('figure.create')}}" class="btn-grad btn-grad-md btn-grad-light text-center">
                        Subir figura
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
