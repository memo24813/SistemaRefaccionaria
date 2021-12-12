<form class="modal modal-open">
    <div class="modal-box">

        <h3 class="text-center font-bold text-lg">Informacion de la empresa y productos</h3>

        <div class="form-control">
            <label class="label">
              <span class="label-text">Empresa</span>
            </label> 
            <input type="text" placeholder="Nombre de la empresa" class="input input-primary input-bordered" wire:model="empresa" disabled>
        </div> 
        @error('empresa') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror
        <div class="grid grid-cols-2 gap-3">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Proveedor</span>
            </label> 
            <input type="text" placeholder="Nombre del proveedor" class="input input-primary input-bordered" wire:model="proveedor" disabled>
          </div> 
          @error('proveedor') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror
          
          <div class="form-control">
            <label class="label">
              <span class="label-text">Telefono</span>
            </label> 
            <input type="tel" placeholder="Telefono del proveedor" class="input input-primary input-bordered" wire:model="telefono" disabled>
          </div>
          @error('telefono') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror 
        </div>
        
        <div class="form-control">
            <label class="label">
            <span class="label-text">Dias de llegada</span>
            </label> 
            <textarea maxlength="200" class="textarea h-24 textarea-bordered textarea-primary" placeholder="Ingresa los dias que la empresa llega al local" wire:model="diasLlegada" disabled></textarea>
            @error('diasLlegada') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror
        </div>

        <h3 class="text-center font-bold text-lg my-2">Productos</h3>

        <div class="max-h-48 overflow-y-auto bg-base-200 shadow-xl rounded-box p-2">
          @forelse ($productos as $producto)
            <div tabindex="0" class="collapse w-full border rounded-box border-base-300 collapse-arrow bg-base-100"> 
              <div class="collapse-title text-base font-medium">
                {{$producto->nombre}}
              </div> 
              <div class="collapse-content"> 
                <p>{{ $producto->descripcion }}</p>
                <p>Cantidad: {{$producto->cantidad}}</p>
                <p>Precio: {{$producto->precio}}</p>
              </div>
            </div> 
          @empty
            <div class="alert alert-warning">
              <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current"> 
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>                         
                </svg> 
                <label>No hay productos registrados con este proveedor.!</label>
              </div>
            </div>
          @endforelse

        </div>
        

        <div class="modal-action">
        <label for="my-modal-2" class="btn" wire:click="closeModal('modalProductos')">Cerrar Informacion</label>
      </div>
    </div>
</form>