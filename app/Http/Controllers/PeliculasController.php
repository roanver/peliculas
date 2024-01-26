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

        $listas->toArray();

        foreach($listas as $key => $pelicula){

        $price = DB::table('rankings')
        ->where('pelicula_id', $pelicula->id)
        ->avg('puntaje');

        $listas[$key]->puntaje = $price;
        }

      }else{

        $listas = Pelicula::where('nombre', 'LIKE', '%'.$busqueda.'%')
          ->orWhere('director','LIKE', '%'.$busqueda.'%')
          ->orWhere('año', $busqueda)
        ->get();

        foreach($listas as $key => $pelicula){

        $price = DB::table('rankings')
        ->where('pelicula_id', $pelicula->id)
        ->avg('puntaje');
  

        $listas[$key]->puntaje = $price;

        }

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

      $price = DB::table('rankings')
        ->where('pelicula_id', $id)
        ->avg('puntaje');
  

       function addKeyAndValue( &$pelicula, $key, $price ) {

        $pelicula[$key] = $price;
      }

      $key="puntaje"; 

      addKeyAndValue($pelicula, $key, $price); 

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




