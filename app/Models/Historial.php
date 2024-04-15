<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historiales';

 

    // public function paciente()
    // {
    //     return $this->hasOne(Paciente::class, 'idHistorial', 'id');
    // }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'idHistorial', 'id');
    }

    public function registros()
    {
        return $this->hasMany(Registro::class, 'idHistorial');
    }
}
