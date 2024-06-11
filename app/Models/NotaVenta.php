<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaVenta extends Model
{
    use HasFactory;
    protected $table = 'nota_ventas';
    protected $fillable = ['metodoPago', 'precio', 'descuento','precioTotal'];

    public function Ordenes()
    {
        return $this->hasOne(Orden::class,  'idNotaVenta', 'id');
    }

    public static function sumTotal()
    {
        return self::sum('precioTotal');
    }

    public static function totalPagos(){
        return self::count();
    }
}
