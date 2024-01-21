<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class Ranking extends Model
{
    protected $fillable = [
        'comentario',
        'puntaje',
        'user_id',
        'pelicula_id'
    ];

    public function user(): BelongsTo{

        return $this->belongsTo(User::class);
    }
}