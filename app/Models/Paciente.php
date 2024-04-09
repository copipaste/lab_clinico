<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'ci',
        'nombre',
        'fechaNacimiento',
        'sexo',
        'telefono',
        'idTipoSeguro',
        'idHistorial',
        'idUser',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }



    public function historial()
    {
        return $this->belongsTo(Historial::class, 'idHistorial', 'id');
    }

    public function tipoSeguro()
    {
        return $this->belongsTo(TipoSeguro::class, 'idTipoSeguro', 'id');
    }
}
