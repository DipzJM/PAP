<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'primeiro_nome',
        'ultimo_nome',
        'nivel',
        'voltas_realizadas',
        'corridas_realizadas',
        'num_moedas',
        'numero_telemovel',
        'imagem',
    ];

}
