<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Comentario;
use App\Models\Ranking;
use Illuminate\Support\Facades\DB;


class PeliculasController extends Controller
{
    public function index(Request $request){ 

      $busqueda =  $request->buscador;
      
      if(empty($busqueda)){
        $listas =  Pelicula::all();
      }else{
        $listas = Pelicula::where('nombre', 'LIKE', '%'.$busqueda.'%')
          ->orWhere('director','LIKE', '%'.$busqueda.'%')
          ->orWhere('año', $busqueda)
        ->get();
      }
      return view('pelicula', compact('listas','busqueda'));

       //whereIn orWher
      // return view('pelis')->with('listas', $listas);
      //return view('pelicula', compact('listas','peliculas'));
    }

    public function show($id, Request $request =null ){

      $pelicula = Pelicula::with('comentario.user')->findOrFail($id);

      $puntaje = Ranking::select('puntaje')->where('user_id', auth()->id())
      ->where('pelicula_id','=',$id)
      ->get();

      $punto=" ";

      if (!empty($puntaje)) {
        // Verificar si el primer elemento tiene la propiedad 'puntaje'
        if (isset($puntaje[0]->puntaje)) {
            $punto = $puntaje[0]->puntaje;
        }
    }
   
      return view('peliculas.show', compact('pelicula','punto')); 
  }
}




