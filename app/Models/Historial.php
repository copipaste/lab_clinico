<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historiales';

    // public function paciente(): BelongsTo
    // {
    //     return $this->belongsTo(Paciente::class);
    // }

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'idHistorial', 'id');
    }
}
