<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// get /peliculas => traer todas las peliculas y que permita filtrar
// get /peliculas/{id} => traer informacion de la pelicula, comentario, puntaje
// post /peliculas/{id}/comentar => permitir comentar una pelicula
// put /peliculas/{id}/puntaje => permite cambiar el puntaje del usuario
