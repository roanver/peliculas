<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentariosController extends Controller
{
    public function create(Request $request){

        $validated = $request->validate([
            'comentario' => 'required|min:5|max:250',
        ]);

        Comentario::create([
            'comentario'=> $request->input('comentario'),
            'user_id'=> auth()->id(),
            'pelicula_id' => $request->input('idPelicula')
        ]);

        return  redirect()->back();
        
    }
}
