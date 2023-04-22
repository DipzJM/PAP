<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilizadorVeiculo extends Model
{
    use HasFactory;

    protected $table = 'utilizadores_veiculos';
    protected $fillable = [
        'id_veiculo',
        'id_utilizador',
    ];

}
