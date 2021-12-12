<?php

namespace App\Http\Livewire;

use App\Models\Deuda;
use App\Models\Proveedor;
use Livewire\Component;

class Deudas extends Component
{
    public $id_deuda,$monto, $abono, $descripcion, $fecha_vencimiento, $id_proveedor;
    public $modal, $modalAbono, $buscador = '';
    public function render()
    {
        if(!empty($this->buscador))
        {
            $deudas = Deuda::where('descripcion','like','%'.$this->buscador.'%')->join('proveedores','deudas.id_proveedor','=','proveedores.id')->select('deudas.*','proveedores.empresa')->paginate(10);
        }
        else
        {
            $deudas = Deuda::join('proveedores','deudas.id_proveedor','=','proveedores.id')->select('deudas.*','proveedores.empresa')->paginate(10);
        }


        return view('livewire.deudas',[
            'deudas' => $deudas,
            'proveedores' => Proveedor::all(),
        ]);
    }


    public function create()
    {
        $this->clearInputs();
        $this->openModal();
    }

    public function save()
    {
        $this->validate([
            'monto' => 'required',
            'abono' => 'required',
            'descripcion' => 'required',
            'fecha_vencimiento' => 'required',
            'id_proveedor' => 'required',
        ]);


        Deuda::UpdateOrCreate(['id' => $this->id],[
            'monto' => $this->monto,
            'abono' => $this->abono,
            'descripcion' => $this->descripcion,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'id_proveedor' => $this->id_proveedor,
        ]);


        session()->flash('message', $this->id_deuda?"Deuda Actualizada Correctamente.":"Deuda Creada Correctamente.");

        $this->clearInputs();
        $this->closeModal();
    }

    public function edit($id)
    {
        $this->openModal();
        $deuda = Deuda::findOrFail($id);
        $this->id_deuda = $deuda->id;
        $this->monto = $deuda->monto;
        $this->abono = $deuda->abono;
        $this->descripcion = $deuda->descripcion;
        $this->fecha_vencimiento = $deuda->fecha_vencimiento;
        $this->id_proveedor = $deuda->id_proveedor;
    }

    public function delete($id)
    {
        Deuda::find($id)->delete();

        session()->flash('message','Deuda Eliminada Correctamente.');
    }

    public function pay()
    {
        $deuda = Deuda::findOrFail($this->id_deuda);

        $this->validate([
            'abono' => 'required',
        ]);

        if(($deuda->monto - ($deuda->abono + $this->abono)) < 0)
        {
            session()->flash('error','Error!. El abono no puede ser mayor a la deuda.');
        }
        else
        {
            $deuda->abono += $this->abono;
            $deuda->save();
            session()->flash('message','El abono se realizo correctamente.');
        }
        $this->closeModal('modalAbono');
        $this->clearInputs();
    }

    public function showPay($id)
    {
        $this->id_deuda = $id;   
        $deuda = Deuda::findOrFail($this->id_deuda);
        $this->monto = $deuda->monto;
        $this->openModal('modalAbono');     
    }

    
    public function clearInputs()
    {
        $this->id_deuda= '';
        $this->monto = '';
        $this->abono = '';
        $this->descripcion = '';
        $this->fecha_vencimiento = '';
        $this->id_proveedor = '';
    }

    public function openModal($modal = 'modal')
    {
        $this->{$modal} = true;
    }

    public function closeModal($modal = 'modal')
    {
        $this->{$modal} = false;
    }
}
