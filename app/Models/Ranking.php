<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class Ranking extends Model
{
    protected $fillable = [
        'puntaje',
        'user_id',
        'pelicula_id'
    ];

    public function user(): BelongsTo{

        return $this->belongsTo(User::class);
    }

    public function pelicula(): BelongsTo{

        return $this->belongsTo(Pelicula::class);
    }
}