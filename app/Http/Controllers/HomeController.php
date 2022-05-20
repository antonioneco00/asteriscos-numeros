<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Figure;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fila = Figure::where('id', '=', '3')->get()[0]->code;
        $columna = Figure::where('id', '=', '4')->get()[0]->code;
        $cuadrado = Figure::where('id', '=', '1')->get()[0]->code;
        $escaleraAsc = Figure::where('id', '=', '2')->get()[0]->code;
        $escaleraDesc = Figure::where('id', '=', '5')->get()[0]->code;
        $piramide = Figure::where('id', '=', '6')->get()[0]->code;
        $numeros = Figure::where('id', '=', '7')->get()[0]->code;

        return view('home', [
            'fila' => $fila,
            'columna' => $columna,
            'cuadrado' => $cuadrado,
            'escaleraAsc' => $escaleraAsc,
            'escaleraDesc' => $escaleraDesc,
            'piramide' => $piramide,
            'numeros' => $numeros
        ]);
    }
}
