<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ranking;
use Illuminate\Validation\Validator;
 


class RankingController extends Controller

{
    public function create( $id, $rating){
    
        dd($id, $rating);

    Ranking::create([
        'puntaje'=> $request->input('rating'),
        'user_id'=> auth()->id(),
        'pelicula_id' => $request->input('idPelicula')
    ]);

    return  redirect()->back();
    }
}
