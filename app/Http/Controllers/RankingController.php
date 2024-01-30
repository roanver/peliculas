<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ranking;
use Illuminate\Validation\Validator;
 


class RankingController extends Controller

{
        public function crear($id, Request $request){
        // Obtén los valores del formulario
        $rating = $request->input('rating');

    //    dd($id, $rating);

        $existingRanking = Ranking::where('user_id', auth()->id())
            ->where('pelicula_id', $id)
            ->first();

        if ($existingRanking) {
            $existingRanking->update(['puntaje' => $rating]);
            return response()->json([
                'status'=> true,
                'message'=> 'Puntaje actualizado'
            ]);

        } else {

            Ranking::create([
                'puntaje' => $rating,
                'user_id' => auth()->id(),
                'pelicula_id' => $id,
            ]);
        }
        
        return response()->json([
            'status'=> true,
            'message'=> 'Puntaje guardado exitosamnete'
        ]);

        
    }
}


 
    

