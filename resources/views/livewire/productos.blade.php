<div>
  <div class="container mx-auto mt-4 p-5 bg-base-100 rounded-box">

      <div class="grid grid-cols-2 gap-5">
          <div>
              <button class="btn" wire:click="create()">Agregar Producto</button>
          </div>
          <div class="form-control">
              <div class="relative">
                <input type="text" placeholder="Buscar producto" class="w-full pr-16 input input-primary input-bordered" wire:model="buscador"> 
                <button class="absolute top-0 right-0 rounded-l-none btn btn-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">             
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>             
                  </svg>
                </button>
              </div>
          </div>  
      </div>

      @if($modal)
        @include('livewire.productos.crear')
      @endif

      @if($modalStock)
        @include('livewire.productos.agregar')
      @endif
      
  </div>

  @if(session()->has('message'))
    <div class="container mx-auto mt-4 p-5">
      <div class="alert alert-success">
        <div class="flex-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>                          
          </svg> 
          <label>{{session('message')}}</label>
        </div>
      </div>
    </div>
  @endif

  <div class="container mx-auto mt-4 p-5 bg-base-100 rounded-box">
      <div class="overflow-x-auto">
          <table class="table w-full">
            <thead>
              <tr>
                <th>Codigo</th> 
                <th></th>
                <th>Nombre</th> 
                <th>Descripcion</th> 
                <th>precio</th>
                <th>Cantidad</th>
                <th>Stock</th>
                <th>Acciones</th>
              </tr>
            </thead> 
            <tbody>
              @forelse ($productos as $producto)
              <tr>    
                  <td>{{ $producto->codigo }}</td> 
                  <td>
                    <div class="avatar">
                      <div class="rounded-btn w-14 h-14">
                        <img src="{{asset('storage/'.$producto->imagen)}}">
                      </div>
                    </div>   
                  </td> 
                  <td>{{ $producto->nombre }}</td> 
                  <td>{{ $producto->descripcion }}</td> 
                  <td>{{ $producto->precio }}</td>
                  <td>{{ $producto->cantidad }}</td>
                  <td>
                    <div class="btn-group">
                      <button wire:click="editStock({{$producto->id}},true)" class="btn bg-green-400 border-green-400 hover:bg-green-600 hover:border-green-600 text-base-content font-bold text-xl">+</button>
                      <button wire:click="editStock({{$producto->id}},false)" class="btn bg-red-400 border-red-400 hover:bg-red-500 hover:border-red-500 text-base-content font-bold text-xl">-</button>
                    </div>
                  </td>
                  <td>
                    <div class="flex gap-2">
                      <button class="btn btn-primary" wire:click="edit({{ $producto->id }})">Editar</button>
                      <button class="btn btn-secondary" wire:click="delete({{ $producto->id }})">Eliminar</button>
                    </div>
                  </td>
                </tr>
              @empty
                  <div class="alert alert-info mb-4">
                    <div class="flex-1">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>                          
                      </svg> 
                      <label>No hay productos registrados en el sistema.</label>
                    </div>
                  </div>                
              @endforelse
            </tbody>
          </table>
        </div>
  </div>
</div>