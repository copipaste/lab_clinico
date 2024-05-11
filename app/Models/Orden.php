<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';
    protected $fillable = ['nroOrden', 'idTipoAnalisis', 'idSolicitud', 'idPaciente'];
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'idPaciente');
    }
    public function OrdenAnalisis()
    {
        return $this->hasMany(OrdenAnalisis::class, 'orden_id');
    }


}

