<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Productos extends Component
{
    use WithFileUploads;
    public $id_producto, $id_proveedor, $codigo, $nombre, $descripcion, $imagen, $precio, $cantidad, $filename, $imageUpload;
    public $modal = false, $buscador = '',$modalStock = false, $cantidadPositiva;

    public function render()
    {
        if(!empty($this->buscador))
        {
            $productos = Producto::where('nombre','like','%'.$this->buscador.'%')->paginate(10);
        }
        else
        {
            $productos = Producto::paginate(10);
        }

        $proveedores = Proveedor::all();

        return view('livewire.productos',[
            'productos' => $productos,
            'proveedores' => $proveedores,
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
            'codigo' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
            'imageUpload' => $this->imagen?'':'required|image',
            'id_proveedor' => 'required',
        ]);

        $this->updateOrCreateImage();

        Producto::updateOrCreate(['id' => $this->id_producto],[
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'imagen' => $this->filename,
            'precio' => $this->precio,
            'cantidad' => $this->cantidad,
            'id_proveedor' => $this->id_proveedor,
        ]);

        session()->flash('message',
            $this->id_producto 
            ?'Producto Actualizado Correctamente.'
            :'Producto Registrado Correctamente.'
        );
        
        $this->closeModal();
        $this->clearInputs();

    }

    public function edit($id)
    {
        $this->openModal();
       $producto = Producto::findOrFail($id);
       $this->id_producto = $producto->id;
       $this->codigo = $producto->codigo;
       $this->nombre = $producto->nombre;
       $this->descripcion = $producto->descripcion;
       $this->imagen = $producto->imagen;
       $this->precio = $producto->precio;
       $this->cantidad = $producto->cantidad;
       $this->id_proveedor = $producto->id_proveedor;
    }

    public function delete($id)
    {
        $this->deleteImage();
        Producto::find($id)->delete();

        session()->flash('message','Producto Eliminado Correctamente.');
    }

    public function saveStock()
    {
        if($this->cantidad >0)
        {
            $producto = Producto::find($this->id_producto);
            if(($producto->cantidad - $this->cantidad)<1 && (!$this->cantidadPositiva))
                $producto->cantidad = 0;
            else if($this->cantidadPositiva)
                $producto->cantidad+= $this->cantidad;    
            else
                $producto->cantidad-= $this->cantidad;

            $producto->save();
            session()->flash('message','Actualizacion de stock realizado correctamente.');
        }
        else
        {
            session()->flash('message','Ingreso una cantidad negativa en stock, intenta nuevamente.');
        }

        $this->closeModalStock();
        $this->clearInputs();
    }

    public function editStock($id,$state)
    {
        $this->cantidadPositiva = $state;
        $this->clearInputs();
        $this->id_producto = $id;
        $this->openModalStock();
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function openModalStock()
    {
        $this->modalStock = true;
    }

    public function closeModalStock()
    {
        $this->modalStock = false;
    }

    public function clearInputs()
    {
        $this->id_producto = '';
        $this->codigo = '';
        $this->nombre = '';
        $this->descripcion = '';
        $this->imagen = '';
        $this->precio = '';
        $this->cantidad = '';
        $this->id_proveedor = '';

        $this->filename = '';
        $this->imageUpload ='';
    }


    public function updateOrCreateImage()
    {
        if($this->imagen && $this->imageUpload)
        {
            //existe imagen eliminar en base de datos
            $this->deleteImage();
            $this->filename = $this->imageUpload->store('product-images','public');
        }
        else if($this->imagen)
        {
            $this->filename = $this->imagen;
        }
        else
        {
            $this->filename = $this->imageUpload->store('product-images','public');
        }
    }


    public function deleteImage()
    {
        // if(Storage::exists('/public/'.$this->imagen))
            Storage::delete('/public/'.$this->imagen);
    }
    
}
