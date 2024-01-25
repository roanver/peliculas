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
}