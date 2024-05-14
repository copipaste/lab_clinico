<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HemogramaCompleto extends Model
{
    use HasFactory;
    protected $fillable = [
        'globulosRojos',
    ];
    protected $table = 'hemograma_completos';
    public function analisis()
    {
        return $this->belongsTo(Analisis::class, 'idAnalisis');
    }

}
