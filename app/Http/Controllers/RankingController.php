<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ranking;

class RankingController extends Controller
{
    public function agregarComentario(Request $request){
        Ranking::create([
            'comentario'=> request('comentario'),
            'puntaje'=> request('puntaje'),
            'user_id'=> auth()->id(),
            'pelicula_id' => 1
        ]);
    }
}
