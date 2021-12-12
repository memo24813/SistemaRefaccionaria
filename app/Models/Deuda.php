<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    use HasFactory;

    protected $fillable = [
        'monto',
        'abono',
        'descripcion',
        'fecha_vencimiento',
        'id_proveedor',
    ];

    protected $table = "deudas";
}
