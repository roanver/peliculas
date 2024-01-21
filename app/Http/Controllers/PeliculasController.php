<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Ranking;

class PeliculasController extends Controller
{
    public function index(){ 
       $listas =  Pelicula::all();  //whereIn orWhere
      // return view('pelis')->with('listas', $listas);
      return view('pelicula', compact('listas'));
    }

    public function show(Request $request){
        
    
    }
}




