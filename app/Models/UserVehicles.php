<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserVehicles extends Model
{
    protected $table = 'utilizadores_veiculos';

    use HasFactory;

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class,'id_veiculo');
    }
}
