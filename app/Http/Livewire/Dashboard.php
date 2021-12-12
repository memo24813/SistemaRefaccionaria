<?php

namespace App\Http\Livewire;

use App\Models\Cotizacion;
use App\Models\Deuda;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard',[
            'cotizaciones' => Cotizacion::where('cotizado','=','false')->get()->count(),
            'deudas' => Deuda::where('monto','>','abono')->join('proveedores','deudas.id_proveedor','=','proveedores.id')->select('deudas.*','proveedores.empresa')->get(),
        ]);
    }
}
