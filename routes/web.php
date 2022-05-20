<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Models\Figure;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Obtener todas las figuras

    /* $figures = Figure::all();
    
    foreach ($figures as $figure) {
        var_dump($figure);
    }

    die();

    $figures = Figure::all();
    
    foreach ($figures as $figure) {
        $figura = $figure->code;

        echo eval('?>' . $figura);
        echo highlight_string($figura, true);
    }

    die();

    */

    return view('welcome');
});

Auth::routes();

Route::get('/tutorial', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/tutorial', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/tutorial', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Figuras

Route::get('/figuras/{type?}/{category?}', [App\Http\Controllers\FigureController::class, 'index'])->name('figure.index');
Route::get('/figura/subir', [App\Http\Controllers\FigureController::class, 'create'])->name('figure.create')->middleware('auth');
Route::post('/figura/guardar', [App\Http\Controllers\FigureController::class, 'save'])->name('figure.save')->middleware('auth');
Route::get('/figura/editar/{id}', [App\Http\Controllers\FigureController::class, 'edit'])->name('figure.edit')->middleware('auth');
Route::post('/figura/actualizar', [App\Http\Controllers\FigureController::class, 'update'])->name('figure.update')->middleware('auth');
Route::get('/figura/eliminar/{id}', [App\Http\Controllers\FigureController::class, 'delete'])->name('figure.delete')->middleware('auth');
Route::get('/figura/detalle/{id}', [App\Http\Controllers\FigureController::class, 'detail'])->name('figure.detail');

// Usuarios

Route::get('/usuario/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('user.config')->middleware('auth');
Route::post('/usuario/actualizar', [App\Http\Controllers\UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::get('/usuario/image/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.image');

// Comentarios

Route::post('/comentario/publicar', [App\Http\Controllers\CommentController::class, 'save'])->name('comment.save');

// Likes

Route::get('/like/{figure_id}', [App\Http\Controllers\LikeController::class, 'like'])->name('like.save');
Route::get('/like/eliminar/{figure_id}', [App\Http\Controllers\LikeController::class, 'removeLike'])->name('like.remove');