<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Ranking extends Model
{
    protected $fillable = [
        'comentario',
        'puntaje',
        'user_id',
        'pelicula_id'
    ];
}