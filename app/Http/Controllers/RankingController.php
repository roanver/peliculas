<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\Pelicula;
 


class RankingController extends Controller

{
    public function create(Request $request){

        Ranking::create([
            'comentario'=> $request->input('comentario'),
            'puntaje'=> $request->input('puntaje'),
            'user_id'=> auth()->id(),
            'pelicula_id' => $request->input('idPelicula')
        ]); 

        return  redirect()->back();
        
    }

    public function show(Request $request){ 
       $id = $request->input('idPeli'); 
        $vistaPeli = Pelicula::where('id', '=',$id)->get(); 
   
        $comentado =  Ranking::where('pelicula_id', $id)->get();
          //whereIn orWhere
       // return view('pelis')->with('listas', $listas);
       return view('comentarios', compact('comentado','vistaPeli'));
     }

}
