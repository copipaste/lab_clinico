<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';
    protected $fillable = ['nroOrden', 'estado','idNotaVenta','idPaciente'];
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'idPaciente');
    }

    public function OrdenAnalisis()
    {
        return $this->hasMany(OrdenAnalisis::class, 'orden_id');
    }
   
    public function tipoanalisis()
    {
        return $this->belongsToMany(TipoAnalisis::class, 'orden_analisis','orden_id','tipo_analisis_id');
    }

    public function notaventa()
    {
        return $this->belongsTo(NotaVenta::class, 'idNotaVenta', 'id');
    }

    public function analisis()
    {
        return $this->hasMany(Analisis::class, 'idOrden');
    }


}

