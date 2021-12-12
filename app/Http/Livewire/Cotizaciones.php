<?php

namespace App\Http\Livewire;

use App\Models\Cotizacion;
use Livewire\Component;

class Cotizaciones extends Component
{
    public $id_cotizacion, $persona, $telefono, $carro, $pedido, $cotizado;
    public $modal = false, $buscador = '';
    public function render()
    {
        if(!empty($this->buscador))
        {
            $cotizaciones = Cotizacion::where('persona','like','%'.$this->buscador.'%')->paginate(10);
        }
        else
        {
            $cotizaciones = Cotizacion::paginate(10);
        }

        return view('livewire.cotizaciones',['cotizaciones' => $cotizaciones]);
    }

    public function create()
    {
        $this->clearInputs();
        $this->openModal();
        $this->cotizado = false;
    }

    public function save()
    {
        $this->validate([
            'persona' => 'required',
            'telefono' => 'required',
            'carro' => 'required',
            'pedido' => 'required|max:200',
        ]);

        Cotizacion::updateOrCreate(['id' => $this->id_cotizacion],[
            'persona' => $this->persona,
            'telefono' => $this->telefono,
            'carro' => $this->carro,
            'pedido' => $this->pedido,
            'cotizado' => $this->cotizado,
        ]);

        
        $this->closeModal();
        $this->clearInputs();

        session()->flash('message',
            $this->id_cotizacion?
                'Cotizacion Actualizada Correctamente.'
                :'Cotizacion Registrada Correctamente.'
        );
    }

    public function edit($id)
    {
        $this->openModal();
        $cotizacion = Cotizacion::find($id);
        $this->id_cotizacion = $cotizacion->id;
        $this->persona = $cotizacion->persona;
        $this->telefono = $cotizacion->telefono;
        $this->carro = $cotizacion->carro;
        $this->pedido = $cotizacion->pedido;
        $this->cotizado = $cotizacion->cotizado;
    }

    public function delete($id)
    {
        Cotizacion::find($id)->delete();
    }

    public function toggleCheck($id)
    {
        $cotizacion = Cotizacion::find($id);
        $cotizacion->cotizado = !$cotizacion->cotizado;
        $cotizacion->save();

        session()->flash('message','Cotizacion actualizada correctamente.');
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function clearInputs()
    {
        $this->id_cotizacion = '';
        $this->persona = '';
        $this->telefono = '';
        $this->carro = '';
        $this->pedido = '';
        $this->cotizado = false;
    }
}
