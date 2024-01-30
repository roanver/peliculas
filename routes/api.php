<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculasController;
use App\Models\Ranking;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\ComentariosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [
    App\Http\Controllers\LoginApiController::class,
    'login'
]);


Route::get('/test', function (Request $request) {
    return 'hola';
});

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/peliculas', ([PeliculasController::class, 'index']))->name('pelicula');
    Route::get('/pelicula/{id}', ([PeliculasController::class, 'show']))->name('peliculas.show');
    Route::post('/peliculas/create', ([ComentariosController::class, 'create']))->name('comentarios.create');
    Route::post('/peliculas/puntuar/{id}', ([RankingController::class, 'crear']))->name('comentarios.puntaje');
});







// get /peliculas => traer todas las peliculas y que permita filtrar
// get /peliculas/{id} => traer informacion de la pelicula, comentario, puntaje
// post /peliculas/{id}/comentar => permitir comentar una pelicula
// put /peliculas/{id}/puntaje => permite cambiar el puntaje del usuario
