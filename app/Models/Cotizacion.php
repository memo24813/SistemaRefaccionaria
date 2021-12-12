<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona',
        'telefono',
        'carro',
        'pedido',
        'cotizado',
    ];

    protected $table = "cotizaciones";
}
