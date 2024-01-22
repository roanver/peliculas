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

    public function rankings()
    {
        return $this->hasMany(Ranking::class, 'pelicula_id', 'id');
    }
}