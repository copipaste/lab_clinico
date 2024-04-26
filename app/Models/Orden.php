<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';
    protected $fillable = ['nroOrden', 'idTipoAnalisis', 'idSolicitud'];

    public function tipoanalisis()
    {
        return $this->belongsTo(TipoAnalisis::class, 'idTipoAnalisis');
    }

}

