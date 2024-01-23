<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ranking;
use Illuminate\Validation\Validator;
 


class RankingController extends Controller

{
    public function create(Request $request){

        $validated = $request->validate([
            'comentario' => 'required|min:5|max:250',
            'puntaje' =>'required|min:0|max:5|max_digits:1|integer'

        ]);

        Ranking::create([
            'comentario'=> $request->input('comentario'),
            'puntaje'=> $request->input('puntaje'),
            'user_id'=> auth()->id(),
            'pelicula_id' => $request->input('idPelicula')
        ]);

        return  redirect()->back();
        
    }


}
