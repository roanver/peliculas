<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Pelicula extends Model
{
    protected $fillable = [
        'nombre',
        'director',
        'año',
    ];

    public function comentario()
    {
        return $this->hasMany(Comentario::class, 'pelicula_id', 'id');
    }

    public function ranking(){
        return $this->hasMany(Ranking::class, 'pelicula_id', 'id'); 
    }

    public function scopeFiltrar($query, $busqueda) {
      
        if(!empty($busqueda)){
            $query->where('nombre', 'LIKE', '%'.$busqueda.'%')
                    ->orWhere('director','LIKE', '%'.$busqueda.'%');

            if (is_numeric($busqueda)) {
                $query->orWhere('año', $busqueda);
            }
        }

        return $query;
    }
}