<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeliculasController;
use App\Models\Ranking;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('dashboard');

} )->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/pelicula', ([PeliculasController::class, 'index']))->name('pelicula');

Route::get('/pelicula/{id}', ([PeliculasController::class, 'show']))->name('peliculas.show');

Route::post('/peliculas.show', ([RankingController::class, 'create']))->name('comentarios.index'); 

Route::post('/pelicula', ([PeliculasController::class,'buscador']))->name('pelicula.b');






require __DIR__.'/auth.php';
