<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'jogos';

    protected $fillable = [
        'id_mapa',
        'id_utilizador_veiculo',
        'descricao',
        'num_voltas',
        'experiencia',
        'num_moedas',
        'volta_mais_rapida',
    ];

}
