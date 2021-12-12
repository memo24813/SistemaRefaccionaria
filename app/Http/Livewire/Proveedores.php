<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Proveedor;
use Livewire\Component;

class Proveedores extends Component
{
    public $id_proveedor,$empresa, $proveedor, $telefono, $diasLlegada, $productos;
    public $modal = false, $buscador = '', $modalProductos = false;
    public function render()
    {
        if(!empty($this->buscador))
        {
            $proveedores = Proveedor::where('proveedor','like','%'.$this->buscador.'%')->paginate(10);
        }
        else
        {
            $proveedores = Proveedor::paginate(10);
        }

        return view('livewire.proveedores',['proveedores' => $proveedores]);
    }

    public function create()
    {
        $this->clearInputs();
        $this->openModal('modal');
    }

    public function save()
    {
        $this->validate([
            'empresa' => 'required',
            'proveedor' => 'required',
            'telefono' => 'required',
            'diasLlegada' => 'required'
        ]);


        Proveedor::updateOrCreate(['id' => $this->id_proveedor],[
            'empresa' => $this->empresa,
            'proveedor' => $this->proveedor,
            'telefono' => $this->telefono,
            'diasLlegada' => $this->diasLlegada,
        ]);

        session()->flash('message',$this->id_proveedor?"Proveedor Actualizado Correctamente.":"Proveedor Creado Correctamente.");

        $this->clearInputs();
        $this->closeModal('modal');
    }

    public function edit($id)
    {
        $this->openModal('modal');

        $proveedor = Proveedor::findOrFail($id);
        $this->id_proveedor = $proveedor->id;
        $this->empresa = $proveedor->empresa;
        $this->proveedor = $proveedor->proveedor;
        $this->telefono = $proveedor->telefono;
        $this->diasLlegada = $proveedor->diasLlegada;

    }

    public function delete($id)
    {
        Proveedor::find($id)->delete();

        session()->flash('message','Proveedor Eliminado Correctamente.');
    }

    public function showProductos($id)
    {
        $this->openModal('modalProductos');

        $proveedor = Proveedor::findOrFail($id);

        $this->id_proveedor = $proveedor->id;
        $this->empresa = $proveedor->empresa;
        $this->proveedor = $proveedor->proveedor;
        $this->telefono = $proveedor->telefono;
        $this->diasLlegada = $proveedor->diasLlegada;
        $this->productos = Producto::all()->where('id_proveedor','=',$this->id_proveedor);
    }


    public function clearInputs()
    {
        $this->id_proveedor = '';
        $this->empresa = '';
        $this->proveedor = '';
        $this->telefono = '';
        $this->diasLlegada = '';
    }

    public function openModal($modalName)
    {
        $this->{$modalName} = true;
    }

    public function closeModal($modalName)
    {
        $this->{$modalName} = false;
    }
}
